# **Web Portofolio & Blog Pribadi**

Sebuah proyek website dinamis yang dibangun menggunakan Laravel 11 untuk memenuhi tugas Responsi Pemrograman Web. Website ini berfungsi sebagai portofolio pribadi untuk menampilkan karya dan sebagai platform blog untuk berbagi tulisan, dilengkapi dengan panel admin untuk manajemen konten.

*(Ganti gambar ini dengan screenshot website Anda yang sudah jadi)*

## **Fitur Utama**

Proyek ini mengimplementasikan semua konsep dasar yang dibutuhkan dalam pengembangan web modern dengan Laravel, serta beberapa fitur tambahan untuk meningkatkan pengalaman pengguna.

* **Otentikasi (Auth):** Sistem login yang aman menggunakan Laravel Breeze. Halaman registrasi publik telah dinonaktifkan untuk menjaga website sebagai portofolio pribadi dengan satu admin.  
* **Manajemen Konten (CRUD):**  
  * **Portofolio:** Admin dapat melakukan operasi Create, Read, Update, dan Delete untuk item portofolio, termasuk upload gambar.  
  * **Blog:** Admin dapat melakukan operasi CRUD penuh untuk postingan blog.  
* **Arsitektur MVC:** Struktur kode yang terorganisir dengan baik, memisahkan antara Model (logika data), View (tampilan), dan Controller (alur aplikasi).  
* **Database & Migrasi:**  
  * Skema database dirancang dan dikelola melalui file **Migration**.  
  * Data awal (contoh) diisi secara otomatis menggunakan **Seeder**.  
* **Desain & UX Modern:**  
  * **Desain Web Responsif:** Tampilan website dirancang menggunakan **Tailwind CSS** agar dapat beradaptasi dengan baik di berbagai ukuran layar (desktop, tablet, dan mobile).  
  * **Tema Terang & Gelap (Auto & Manual):** Tema website secara otomatis menyesuaikan dengan pengaturan sistem operasi pengguna dan juga dapat diubah secara manual melalui tombol di navbar.  
  * **Halaman 404 Kustom:** Halaman error "Not Found" yang ramah pengguna dan konsisten dengan desain website.  
  * **Pesan Notifikasi Dinamis:** Pesan sukses di panel admin akan hilang secara otomatis setelah beberapa detik.

## **Teknologi yang Digunakan**

* **Backend:** PHP 8.2+, Laravel 11  
* **Frontend:** Tailwind CSS, Alpine.js  
* **Database:** MySQL / MariaDB  
* **Server Development:** Server bawaan PHP, Vite

## **Cara Menjalankan Proyek Secara Lokal**

Berikut adalah langkah-langkah untuk menginstal dan menjalankan proyek ini di komputer Anda.

#### **1\. Prasyarat**

* PHP (versi 8.2 atau lebih tinggi)  
* Composer  
* Node.js & NPM  
* Database Server (misalnya XAMPP untuk MySQL/MariaDB)

#### **2\. Instalasi**

Clone repositori ini ke komputer Anda:

git clone \[URL\_GITHUB\_ANDA\]  
cd nama-folder-proyek

Instal semua dependensi PHP:

composer install

Instal semua dependensi JavaScript/CSS:

npm install

#### **3\. Konfigurasi Lingkungan**

Salin file .env.example menjadi .env:

copy .env.example .env

Buka file .env dan atur koneksi database Anda:

DB\_CONNECTION=mysql  
DB\_HOST=127.0.0.1  
DB\_PORT=3306  
DB\_DATABASE=portofolio\_blog  
DB\_USERNAME=root  
DB\_PASSWORD=

*Pastikan Anda sudah membuat database kosong dengan nama portofolio\_blog di phpMyAdmin.*

Buat kunci aplikasi (Application Key):

php artisan key:generate

#### **4\. Migrasi dan Seeding Database**

Jalankan perintah ini untuk membuat semua tabel dan mengisinya dengan data contoh:

php artisan migrate:fresh \--seed

#### **5\. Menjalankan Server**

Proyek ini membutuhkan dua server yang berjalan bersamaan di dua terminal terpisah.

**Di Terminal 1 (untuk Backend PHP):**

php \-S localhost:8011 \-t public

**Di Terminal 2 (untuk Frontend Vite):**

npm run dev

#### **6\. Mengakses Aplikasi**

* **Halaman Utama:** Buka http://localhost:8011 di browser Anda.  
* **Halaman Login:** Buka http://localhost:8011/login

#### **Membuat Akun Admin**

Registrasi publik telah dinonaktifkan. Untuk membuat akun admin Anda, gunakan tinker:

php artisan tinker

Lalu jalankan kode berikut (ganti dengan data Anda):

$user \= new App\\Models\\User;  
$user-\>name \= 'Nama Anda';  
$user-\>email \= 'email@anda.com';  
$user-\>password \= bcrypt('passwordrahasia');  
$user-\>save();

*Proyek ini dibuat oleh Achmad Fitto R.*