<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post; // <-- Import model
use App\Models\User; // <-- Import model
use Illuminate\Support\Str; // <-- Import Str

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        // Ambil user pertama sebagai penulis, atau buat jika tidak ada
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
            ]);
        }

        Post::create([
            'user_id' => $user->id,
            'title' => 'Pentingnya Desain Responsif di Era Mobile',
            'slug' => Str::slug('Pentingnya Desain Responsif di Era Mobile'),
            'content' => 'Di zaman sekarang, mayoritas pengguna mengakses internet melalui perangkat mobile. Oleh karena itu, memiliki website yang responsif bukan lagi pilihan, melainkan keharusan. Artikel ini akan membahas mengapa desain responsif sangat penting untuk pengalaman pengguna dan SEO.',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => '5 Tips Fotografi untuk Pemula',
            'slug' => Str::slug('5 Tips Fotografi untuk Pemula'),
            'content' => 'Memulai hobi fotografi bisa terasa menantang. Namun, dengan beberapa tips dasar, Anda bisa mulai menghasilkan foto yang menarik. Mulai dari pemahaman komposisi, pencahayaan, hingga pemilihan lensa yang tepat.',
        ]);
    }
}
