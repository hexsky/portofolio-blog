<?php

namespace App\Http\Controllers;

use App\Models\Portfolio; // <-- Jangan lupa import model Portfolio
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // <-- Import untuk mengelola file

class PortfolioController extends Controller
{
    /**
     * Menampilkan daftar portofolio di halaman admin.
     */
    public function index()
    {
        // Mengambil semua data portfolio dari yang terbaru
        $portfolios = Portfolio::latest()->paginate(10); // paginate untuk membatasi data per halaman
        
        // Mengirim data ke view 'dashboard.portfolios.index'
        return view('dashboard.portfolios.index', compact('portfolios'));
    }

    /**
     * Menampilkan halaman publik untuk semua portfolio.
     */
    public function indexPublic()
    {
        $portfolios = Portfolio::latest()->get();
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Menampilkan form untuk membuat item portofolio baru.
     */
    public function create()
    {
        // Langsung tampilkan view 'dashboard.portfolios.create'
        return view('dashboard.portfolios.create');
    }

    /**
     * Menyimpan item portofolio baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi untuk gambar
        ]);

        // 2. Handle upload gambar
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/portfolios'), $imageName);

        // 3. Simpan data ke database
        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imageName, // Simpan nama file gambar
        ]);
     
        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('portfolios.index')
                        ->with('success','Portfolio item created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit item portofolio.
     * Kita menggunakan $portfolio untuk menerima data item yang akan diedit.
     */
    public function edit(Portfolio $portfolio)
    {
        // Mengirim data portfolio yang dipilih ke view 'dashboard.portfolios.edit'
        return view('dashboard.portfolios.edit', compact('portfolio'));
    }

    /**
     * Memperbarui item portofolio di database.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // 1. Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // gambar tidak wajib diisi saat update
        ]);

        // Default nama gambar adalah nama gambar yang lama
        $imageName = $portfolio->image;

        // 2. Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldImagePath = public_path('images/portfolios/' . $portfolio->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload gambar baru
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/portfolios'), $imageName);
        }

        // 3. Update data di database
        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imageName,
        ]);
    
        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('portfolios.index')
                        ->with('success','Portfolio item updated successfully');
    }

    /**
     * Menghapus item portofolio dari database.
     */
    public function destroy(Portfolio $portfolio)
    {
        // 1. Hapus file gambar dari folder public
        $imagePath = public_path('images/portfolios/' . $portfolio->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // 2. Hapus data dari database
        $portfolio->delete();
     
        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('portfolios.index')
                        ->with('success','Portfolio item deleted successfully');
    }
}
