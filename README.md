*Proyek ini dibuat oleh [Achmad Fitto Rizky] - [L0123005]*

# **Website Portofolio & Blog Pribadi**

Ini adalah proyek website yang dibangun untuk memenuhi tugas Responsi Pemrograman Web. Website ini berfungsi sebagai portofolio pribadi untuk menampilkan karya dan sebagai platform blog untuk berbagi tulisan. Proyek ini dibangun dari awal menggunakan framework Laravel 11.

## **Fitur Utama**

Proyek ini mengimplementasikan semua konsep dasar yang dibutuhkan dalam pengembangan web modern dengan Laravel:

* **Model-View-Controller (MVC):** Struktur kode yang terorganisir dengan baik, memisahkan logika bisnis, tampilan, dan kontrol alur aplikasi.  
* **Otentikasi (Auth):** Sistem login dan register yang aman menggunakan Laravel Breeze. Hanya admin (user yang terdaftar) yang dapat mengelola konten.  
* **Manajemen Portofolio (CRUD):** Admin dapat melakukan operasi Create, Read, Update, dan Delete untuk item-item portofolio, termasuk upload gambar.  
* **Manajemen Blog (CRUD):** Admin dapat melakukan operasi Create, Read, Update, dan Delete untuk postingan blog.  
* **Database Migration & Seeding:** Skema database dikelola melalui file migrasi, dan data awal (contoh) diisi menggunakan seeder.  
* **Desain Web Responsif:** Tampilan website dirancang agar dapat beradaptasi dengan baik di berbagai ukuran layar (desktop, tablet, dan mobile) menggunakan **Tailwind CSS**.  
* **Routing & URL Ramah:** Menggunakan sistem routing Laravel untuk membuat URL yang bersih dan mudah dibaca (misalnya, /blog/judul-postingan-anda).

## **Teknologi yang Digunakan**

* **Backend:** PHP 8, Laravel 11  
* **Frontend:** Tailwind CSS, Alpine.js  
* **Database:** MySQL
* **Server Development:** Server bawaan PHP, Vite

## **Cara Menjalankan Proyek Secara Lokal**

Berikut adalah langkah-langkah untuk menginstal dan menjalankan proyek ini di komputer Anda.

### **1. Prasyarat**

* PHP (versi 8.2 atau lebih tinggi)  
* Composer  
* Node.js & NPM  
* Database Server (misalnya XAMPP untuk MySQL/MariaDB)

### **2. Instalasi**

Clone repositori ini ke komputer Anda:

git clone [URL_GITHUB_ANDA]  
cd nama-folder-proyek

Instal semua dependensi PHP:

composer install

Instal semua dependensi JavaScript/CSS:

npm install

### **3. Konfigurasi Lingkungan**

Salin file .env.example menjadi .env:

copy .env.example .env

Buka file .env dan atur koneksi database Anda:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=portofolio_blog  
DB_USERNAME=root  
DB_PASSWORD=

*Pastikan Anda sudah membuat database kosong dengan nama portofolio\_blog di phpMyAdmin.*

Buat kunci aplikasi (Application Key):

php artisan key:generate

### **4. Migrasi dan Seeding Database**

Jalankan perintah ini untuk membuat semua tabel dan mengisinya dengan data contoh:

php artisan migrate:fresh --seed

### **5. Menjalankan Server**

Proyek ini membutuhkan dua server yang berjalan bersamaan di dua terminal terpisah.

**Di Terminal 1 (untuk Backend PHP):**

php -S localhost:8011 -t public

**Di Terminal 2 (untuk Frontend Vite):**

npm run dev

### **6 Mengakses Aplikasi**

Buka browser Anda dan kunjungi:

* **Halaman Utama:** http://localhost:8011  
* **Halaman Login:** http://localhost:8011/login

### **Akun Demo**

Anda bisa login menggunakan akun yang sudah dibuat oleh seeder:

* **Email:** admin@example.com  
* **Password:** password