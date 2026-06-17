<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\Management;
use App\Models\Umkm;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $announcements = Announcement::where('status', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $galleries = Gallery::latest()->take(6)->get();

        return view('public.home', compact('posts', 'announcements', 'galleries'));
    }

    public function about()
    {
        $managements = Management::all();
        return view('public.about', compact('managements'));
    }

    public function posts(Request $request)
    {
        $query = Post::where('status', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $posts = $query->latest('published_at')->paginate(6);
        $categories = ['Kerja Bakti', '17 Agustus', 'Santunan', 'Olahraga', 'Event Pemuda'];

        return view('public.posts', compact('posts', 'categories'));
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Fetch related posts
        $relatedPosts = Post::where('status', true)
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest()
            ->take(3)
            ->get();

        return view('public.post-detail', compact('post', 'relatedPosts'));
    }

    public function announcements()
    {
        $announcements = Announcement::where('status', true)
            ->latest('published_at')
            ->paginate(5);

        return view('public.announcements', compact('announcements'));
    }

    public function announcementDetail($slug)
    {
        $announcement = Announcement::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('public.announcement-detail', compact('announcement'));
    }

    public function gallery(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $galleries = $query->latest()->paginate(6);
        
        // Extract unique categories from galleries for filtering
        $categories = Gallery::select('category')->distinct()->pluck('category')->toArray();

        return view('public.gallery', compact('galleries', 'categories'));
    }

    public function umkm()
    {
        $umkms = Umkm::where('status', true)->latest()->paginate(6);
        return view('public.umkm', compact('umkms'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
