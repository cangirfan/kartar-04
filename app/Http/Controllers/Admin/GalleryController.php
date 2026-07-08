<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->pluck('name');
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', Rule::exists('categories', 'name')->where('is_active', true)],
            'image' => 'required|image|max:3072',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure public disk folder exists
            if (!file_exists(storage_path('app/public/galleries'))) {
                mkdir(storage_path('app/public/galleries'), 0755, true);
            }

            try {
                // Crop to square 800x800 for consistent grids
                $img = Image::read($file);
                $img->cover(800, 800);
                $img->save(storage_path('app/public/galleries/' . $filename));
                $imagePath = 'galleries/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('galleries', $filename, 'public');
            }
        }

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $categories = Category::active()->ordered()->pluck('name');
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', Rule::exists('categories', 'name')->where('is_active', true)],
            'image' => 'nullable|image|max:3072',
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            // Delete old file
            if (!empty($gallery->image) && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/galleries'))) {
                mkdir(storage_path('app/public/galleries'), 0755, true);
            }

            try {
                // Resize with Intervention
                $img = Image::read($file);
                $img->cover(800, 800);
                $img->save(storage_path('app/public/galleries/' . $filename));
                $imagePath = 'galleries/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('galleries', $filename, 'public');
            }
        }

        $gallery->update([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete file
        if (!empty($gallery->image) && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
