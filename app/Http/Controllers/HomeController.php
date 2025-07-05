<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 item portofolio terbaru
        $portfolios = Portfolio::latest()->take(3)->get();

        // Ambil 3 postingan blog terbaru BESERTA data penulisnya (Eager Loading)
        $posts = Post::with('user')->latest()->take(3)->get();

        // Kirim data ke view 'welcome'
        return view('welcome', compact('portfolios', 'posts'));
    }

    /**
     * Menampilkan dashboard admin dengan data statistik.
     */
    public function dashboard()
    {
        $portfolioCount = Portfolio::count();
        $postCount = Post::count();

        return view('dashboard', compact('portfolioCount', 'postCount'));
    }
}
