# TP7DPBO2025C1

## Direktori
├── class/              # Folder berisi class-class utama (model)

│   ├── Produk.php      # Class untuk mengelola data produk

│   ├── Review.php      # Class untuk mengelola data review

│   └── Users.php       # Class untuk mengelola data pengguna

├── config/             # Folder konfigurasi

│   └── config.php      # File konfigurasi utama dan koneksi database

├── view/               # Folder berisi tampilan/view

│   ├── add_produk.php      # Form tambah produk

│   ├── add_review.php      # Form tambah review

│   ├── add_users.php       # Form tambah user

│   ├── delete_produk.php   # Proses hapus produk

│   ├── delete_review.php   # Proses hapus review

│   ├── delete_users.php    # Proses hapus user

│   ├── footer.php          # Footer untuk semua halaman

│   ├── header.php          # Header untuk semua halaman

│   ├── produk.php          # Tampilan daftar produk

│   ├── review.php          # Tampilan daftar review

│   ├── update_produk.php   # Form update produk

│   ├── update_review.php   # Form update review

│   ├── update_users.php    # Form update user

│   └── users.php           # Tampilan daftar users

├── index.php           # Halaman utama

└── style.css           # File CSS untuk styling

## Alur Program
Inisialisasi: Aplikasi dimulai dari index.php yang berfungsi sebagai controller utama.
Routing: index.php memuat header, menu navigasi, dan konten yang sesuai berdasarkan parameter ?page= pada URL.
Model: Class dalam folder class/ menangani logika bisnis dan interaksi dengan database.
View: File dalam folder view/ menangani tampilan untuk setiap fitur.
Database: Koneksi database diatur dalam config/config.php menggunakan PDO.

## Fitur Utama
1. Manajemen Produk:
  - Menampilkan daftar produk
  - Menambah produk baru
  - Mengubah data produk
  - Menghapus produk
  - Pencarian produk berdasarkan nama atau brand

2. Manajemen Review:
  - Menampilkan daftar review dengan data produk dan user
  - Menambah review baru
  - Mengubah review
  - Menghapus review
  - Pencarian review berdasarkan konten, produk, atau user

3. Manajemen User:
  - Menampilkan daftar user
  - Menambah user baru
  - Mengubah data user
  - Menghapus user
