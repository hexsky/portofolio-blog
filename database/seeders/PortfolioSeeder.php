<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio; // <-- Import model

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikat
        Portfolio::truncate();

        // Buat data contoh
        Portfolio::create([
            'title' => 'Desain Website Perusahaan',
            'description' => 'Membuat desain antarmuka yang modern dan responsif untuk website profil perusahaan XYZ.',
            'category' => 'UI/UX Design',
            'image' => 'sample-1.jpg', // Anda perlu menyiapkan gambar ini
        ]);

        Portfolio::create([
            'title' => 'Aplikasi Mobile E-Commerce',
            'description' => 'Pengembangan aplikasi mobile untuk platform Android dan iOS menggunakan teknologi cross-platform.',
            'category' => 'Mobile Development',
            'image' => 'sample-2.jpg', // Anda perlu menyiapkan gambar ini
        ]);

        Portfolio::create([
            'title' => 'Fotografi Produk Makanan',
            'description' => 'Sesi pemotretan profesional untuk katalog menu restoran dengan tema rustic.',
            'category' => 'Fotografi',
            'image' => 'sample-3.jpg', // Anda perlu menyiapkan gambar ini
        ]);
    }
}
