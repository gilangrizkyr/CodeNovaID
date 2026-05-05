# CodeNova Indonesia - Enterprise IT Solutions Platform

CodeNova adalah platform CMS (Content Management System) kustom berbasis **CodeIgniter 4** yang dirancang khusus untuk perusahaan teknologi, agensi kreatif, dan konsultan IT. Platform ini menggabungkan profil perusahaan yang premium dengan fitur operasional bisnis yang lengkap.

---

## 🚀 Fitur Utama

### 1. **Public Interface (High Performance)**
*   **Landing Page Dinamis**: Tampilan beranda modern dengan animasi marquee, slider tim, dan testimoni.
*   **Katalog Layanan**: Penjelasan detail layanan IT dengan optimasi SEO di setiap halaman.
*   **Portofolio & Studi Kasus**: Galeri proyek yang telah diselesaikan dengan filter kategori.
*   **Digital Shop**: Penjualan produk digital (script, template, source code) dengan integrasi WhatsApp Checkout.
*   **Blog & Insight**: Sistem manajemen artikel dengan penghitung jumlah tayangan (*view count*) dan optimasi SEO.
*   **Profil Tim**: Halaman personal untuk setiap anggota tim yang menampilkan bio, keahlian, dan tautan sosial media.

### 2. **Admin Dashboard (Enterprise Grade)**
*   **Real-time Analytics**: Statistik interaksi klien (inquiry) dalam 7 hari terakhir menggunakan Chart.js.
*   **Content Management System (CMS)**: Kelola semua konten (Service, Portfolio, Blog, Team, Clients) tanpa perlu menyentuh kode.
*   **Inquiry Tracking**: Kelola pesan masuk dari calon klien dengan sistem *tracking code* otomatis.
*   **Site Configuration**: Ubah logo, favicon, informasi kontak, hingga link sosial media langsung dari panel admin.
*   **Sistem Log Aktivitas**: Pantau setiap perubahan yang dilakukan oleh admin untuk keamanan sistem.

---

## 🛠️ Tech Stack

*   **Backend**: PHP 8.2+ dengan Framework CodeIgniter 4.
*   **Frontend**: HTML5, Tailwind CSS (Styling), Alpine.js (Interactivity).
*   **Database**: MySQL / MariaDB.
*   **Library**: 
    *   `Chart.js` untuk visualisasi data.
    *   `ImageProcessor` (Custom Library) untuk optimasi upload gambar.
    *   `SeoHelper` untuk optimasi Meta Tag & Open Graph secara otomatis.

---

## 📁 Struktur Direktori Penting

*   `app/Controllers/Admin/`: Logika bisnis untuk panel administrasi.
*   `app/Controllers/Public/`: Logika tampilan sisi pengunjung.
*   `app/Models/`: Definisi tabel database dan query data.
*   `app/Views/admin/`: Template UI untuk Dashboard Admin.
*   `app/Views/public/`: Template UI untuk Website Publik.
*   `app/Views/layouts/`: Template dasar (Admin & Public).
*   `public/uploads/`: Direktori penyimpanan aset gambar dan dokumen.

---

## ⚙️ Instalasi

1.  **Clone Repository**
2.  **Konfigurasi Environment**:
    *   Salin `env` menjadi `.env`.
    *   Sesuaikan `database.default.hostname`, `database.default.database`, `username`, dan `password`.
    *   Set `app.baseURL` ke URL lokal Anda (contoh: `http://localhost:8080`).
3.  **Install Dependencies**:
    ```bash
    composer install
    ```
4.  **Migrasi Database**:
    ```bash
    php spark migrate
    ```
5.  **Seeding Data Produksi (Opsional)**:
    ```bash
    php spark db:seed SuperSeeder
    ```
6.  **Jalankan Server Lokal**:
    ```bash
    php spark serve
    ```

---

## 🔐 Kredensial Default (Development)

*   **URL Admin**: `http://localhost:8080/admin`
*   **Email**: `admin@codenova.id`
*   **Password**: `admin123`

---

## 📄 Lisensi

Platform ini dikembangkan secara eksklusif untuk **CodeNova Indonesia**. Penggunaan, penggandaan, atau modifikasi tanpa izin tertulis dari pemilik adalah dilarang.

---
*© 2026 CodeNova Indonesia. Built for Excellence.*
