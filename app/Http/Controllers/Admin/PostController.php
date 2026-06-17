<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Kerja Bakti', '17 Agustus', 'Santunan', 'Olahraga', 'Event Pemuda'];
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Kerja Bakti,17 Agustus,Santunan,Olahraga,Event Pemuda',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure public disk folder exists
            if (!file_exists(storage_path('app/public/posts'))) {
                mkdir(storage_path('app/public/posts'), 0755, true);
            }

            try {
                // Crop and resize using Intervention Image
                $img = Image::read($file);
                $img->cover(800, 450); // aspect ratio 16:9
                $img->save(storage_path('app/public/posts/' . $filename));
                $thumbnailPath = 'posts/' . $filename;
            } catch (\Throwable $e) {
                // Fallback to normal upload if GD/Intervention is misconfigured
                $thumbnailPath = $file->storeAs('posts', $filename, 'public');
            }
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'content' => $request->content,
            'category' => $request->category,
            'thumbnail' => $thumbnailPath,
            'published_at' => $request->published_at ?? now(),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Redirecting show to the edit page or public details
        return redirect()->route('admin.posts.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = ['Kerja Bakti', '17 Agustus', 'Santunan', 'Olahraga', 'Event Pemuda'];
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Kerja Bakti,17 Agustus,Santunan,Olahraga,Event Pemuda',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $thumbnailPath = $post->thumbnail;

        if ($request->hasFile('thumbnail')) {
            // Delete old file
            if (!empty($post->thumbnail) && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/posts'))) {
                mkdir(storage_path('app/public/posts'), 0755, true);
            }

            try {
                // Resize with Intervention
                $img = Image::read($file);
                $img->cover(800, 450);
                $img->save(storage_path('app/public/posts/' . $filename));
                $thumbnailPath = 'posts/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $thumbnailPath = $file->storeAs('posts', $filename, 'public');
            }
        }

        $post->update([
            'title' => $request->title,
            // Keep original slug unless title changes significantly
            'slug' => Str::slug($request->title) !== Str::slug($post->title) 
                ? Str::slug($request->title) . '-' . Str::random(5) 
                : $post->slug,
            'content' => $request->content,
            'category' => $request->category,
            'thumbnail' => $thumbnailPath,
            'published_at' => $request->published_at ?? $post->published_at,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image
        if (!empty($post->thumbnail) && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
