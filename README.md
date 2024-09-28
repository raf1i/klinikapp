# Aplikasi Klinik

## Laravel 11

Proyek aplikasi klinik ini dikembangkan menggunakan Laravel 11 sebagai bagian dari program pembelajaran Web Programming di StudentDay. Aplikasi ini dikerjakan oleh Rafi, bersama bimbingan dari para guru dan asisten yang luar biasa.

Berikut adalah **README.md** tanpa screenshot gambar, Anda bisa menambahkan tautan ke Google Slides di bagian yang diperlukan:

---

# **App-Klinik: Sistem Manajemen Data Pasien**

Aplikasi **App-Klinik** adalah sistem manajemen pasien yang membantu klinik dalam mengelola data pasien, termasuk fitur **tambah**, **lihat**, **edit**, dan **hapus data pasien**, serta pengelolaan **jenis kelamin**, **usia**, **foto**, dan **alamat** pasien. Aplikasi ini juga dilengkapi dengan fitur **login** untuk keamanan pengguna.

---

## **Fitur Utama**

- [x] **Fitur Login** untuk memastikan keamanan akses aplikasi.
- [x] **Dashboard** dengan tampilan statistik dan informasi pasien.
- [x] **Lihat Data Pasien** dengan rincian lengkap seperti **jenis kelamin**, **usia**, **foto pasien**, dan **alamat**.
- [x] **Tambah Data Pasien** melalui form input sederhana.
- [x] **Edit Data Pasien** yang memungkinkan pengeditan informasi pasien yang ada.
- [x] **Hapus Data Pasien** dengan konfirmasi sebelum penghapusan.

---

### 1. **Halaman Welcome dengan Fitur Login**
   > **Deskripsi**: Halaman utama yang menyambut pengguna dengan opsi **Login** untuk mengakses fitur aplikasi.

### 2. **Dashboard (Home)**
   > **Deskripsi**: Halaman **dashboard** yang menampilkan statistik dan informasi penting terkait data pasien yang terdaftar di klinik.

### 3. **Lihat Data Pasien**
   > **Deskripsi**: Halaman **lihat data pasien** menampilkan daftar pasien lengkap dengan rincian seperti **nama**, **jenis kelamin**, **usia**, **alamat**, dan **foto** pasien. Tombol aksi disediakan untuk **edit** dan **hapus** data.

### 4. **Tambah Data Pasien**
   > **Deskripsi**: Halaman untuk **menambah data pasien** baru dengan input informasi yang diperlukan seperti **nama**, **jenis kelamin**, **usia**, **alamat**, dan **foto** pasien.

### 5. **Edit Data Pasien**
   > **Deskripsi**: Form **edit data pasien** untuk memperbarui informasi pasien yang sudah ada di sistem.

### 6. **Hapus Data Pasien**
   > **Deskripsi**: Fitur untuk **menghapus data pasien** dengan konfirmasi sebelum penghapusan dilakukan.

---

## **Struktur Branch di GitHub**

Proyek ini dikembangkan melalui beberapa branch di GitHub:

- **Branch Pertemuan7**
- **Branch Pertemuan8**
- **Branch PSTS**
- **Branch main**

---

## **Cara Menggunakan Aplikasi**

Berikut adalah langkah-langkah untuk menggunakan aplikasi ini secara lokal:

1. **Clone repository** dari GitHub:
   ```bash
   git clone https://github.com/username/klinikapp.git
   cd klinikapp
   ```

2. **Pilih branch yang ingin digunakan**:
   ```bash
   git checkout BranchName
   ```

3. **Install dependensi**:
   ```bash
   composer install
   npm install
   ```

4. **Konfigurasi file `.env`** untuk menghubungkan dengan database lokal Anda.

5. **Jalankan migrasi dan seed database**:
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan aplikasi**:
   ```bash
   php artisan serve
   ```


