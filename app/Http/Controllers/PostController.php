<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import model Post
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str untuk membuat slug
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan user ID
use Illuminate\Support\Facades\File; // Import File untuk mengelola file

class PostController extends Controller
{
    /**
     * Menampilkan daftar post di halaman admin.
     */
    public function index()
    {
        // Mengambil semua data post, dari yang terbaru
        $posts = Post::latest()->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Menampilkan halaman publik untuk list semua post.
     */
    public function indexPublic()
    {
        $posts = Post::latest()->paginate(5); // 5 post per halaman
        return view('blog.index', compact('posts'));
    }

    /**
     * Menampilkan satu post di halaman publik.
     */
    public function showPublic(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    /**
     * Menampilkan form untuk membuat post baru.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Menyimpan post baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'title' => 'required|string|max:255|unique:posts', // judul harus unik
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        // 2. Handle upload gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        }

        // 3. Simpan data ke database
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'), // Membuat slug dari judul
            'content' => $request->content,
            'image' => $imageName,
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('posts.index')
                        ->with('success', 'Postingan berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit post.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Memperbarui post di database.
     */
    public function update(Request $request, Post $post)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id, // unik, kecuali untuk post ini sendiri
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $post->image;
        // 2. Cek jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($post->image) {
                File::delete(public_path('images/posts/' . $post->image));
            }
            // Upload gambar baru
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        }

        // 3. Update data
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'content' => $request->content,
            'image' => $imageName,
            // user_id tidak perlu diupdate
        ]);

        // 4. Redirect
        return redirect()->route('posts.index')
                        ->with('success', 'Postingan berhasil diperbarui.');
    }

    /**
     * Menghapus post dari database.
     */
    public function destroy(Post $post)
    {
        // 1. Hapus gambar
        if ($post->image) {
            File::delete(public_path('images/posts/' . $post->image));
        }

        // 2. Hapus data dari DB
        $post->delete();

        // 3. Redirect
        return redirect()->route('posts.index')
                        ->with('success', 'Postingan berhasil dihapus.');
    }
}
