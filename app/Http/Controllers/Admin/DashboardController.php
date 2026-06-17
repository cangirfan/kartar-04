<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\Umkm;
use App\Models\Management;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts_count' => Post::count(),
            'announcements_count' => Announcement::count(),
            'galleries_count' => Gallery::count(),
            'umkms_count' => Umkm::count(),
            'managements_count' => Management::count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();
        $recentAnnouncements = Announcement::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentAnnouncements'));
    }
}
