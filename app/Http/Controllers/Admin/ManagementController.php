<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managements = Management::all();
        return view('admin.managements.index', compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.managements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/managements'))) {
                mkdir(storage_path('app/public/managements'), 0755, true);
            }

            try {
                // Crop profile to square 400x400
                $img = Image::read($file);
                $img->cover(400, 400);
                $img->save(storage_path('app/public/managements/' . $filename));
                $imagePath = 'managements/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('managements', $filename, 'public');
            }
        }

        Management::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.managements.index')->with('success', 'Pengurus berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Management $management)
    {
        return view('admin.managements.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Management $management)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $management->image;

        if ($request->hasFile('image')) {
            // Delete old file
            if (!empty($management->image) && Storage::disk('public')->exists($management->image)) {
                Storage::disk('public')->delete($management->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/managements'))) {
                mkdir(storage_path('app/public/managements'), 0755, true);
            }

            try {
                // Crop profile to square 400x400
                $img = Image::read($file);
                $img->cover(400, 400);
                $img->save(storage_path('app/public/managements/' . $filename));
                $imagePath = 'managements/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('managements', $filename, 'public');
            }
        }

        $management->update([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.managements.index')->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Management $management)
    {
        // Delete image
        if (!empty($management->image) && Storage::disk('public')->exists($management->image)) {
            Storage::disk('public')->delete($management->image);
        }

        $management->delete();

        return redirect()->route('admin.managements.index')->with('success', 'Data pengurus berhasil dihapus.');
    }
}
