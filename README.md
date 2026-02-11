# 🎓 Ahlan Academic System & Professional CV

Selamat datang di repository **Ahlan Academic System**. Proyek ini adalah aplikasi web berbasis **Laravel 12** yang menggabungkan portofolio CV profesional dengan sistem manajemen akademik (CRUD Mahasiswa & Mata Kuliah).

---

## 📸 Penampilan Web (Screenshots)

> **Catatan:** Untuk melihat tampilan web, silakan screenshot hasil running di localhost Anda dan letakkan filenya di sini.

### 1. Modern Professional CV
![Screenshot CV](public/img/screenshot-cv.png)
*Tampilan CV interaktif dengan desain Glassmorphism dan Layout Landscape.*

### 2. Welcome Page (Orange-Grey Theme)
![Screenshot Welcome](public/img/screenshot-welcome.png)
*Halaman transisi mahasiswa dengan navigasi yang intuitif.*

### 3. Management Mahasiswa (CRUD)
![Screenshot CRUD Mahasiswa](public/img/screenshot-mahasiswa.png)
*Kelola data mahasiswa lengkap dengan relasi mata kuliah.*

### 4. Management Mata Kuliah
![Screenshot CRUD MK](public/img/screenshot-matakuliah.png)
*Kelola data mata kuliah dengan validasi SKS (1-6).*

---

## 🚀 Fitur Utama

-   ✅ **Professional CV**: Desain modern, responsive, dan fitur upload foto profil (AJAX).
-   ✅ **CRUD Mahasiswa**: Sistem input data mahasiswa (NIM, Nama, Jurusan, Email).
-   ✅ **CRUD Mata Kuliah**: Sistem input data mata kuliah dengan validasi range SKS.
-   ✅ **Relasi Many-to-Many**: Implementasli relasi antara Mahasiswa dan Mata Kuliah menggunakan Pivot Table.
-   ✅ **Navigasi Mulus**: Perpindahan antar halaman tanpa refresh yang membosankan.
-   ✅ **UI/UX Menarik**: Menggunakan kombinasi warna Orange-Grey yang hangat dan profesional.

---

## 🛠️ Teknologi yang Digunakan

-   **Backend**: Laravel 12 (PHP 8.x)
-   **Database**: SQLite (Ringan dan Portable)
-   **Frontend**: HTML5, Vanilla CSS, JavaScript (Tanpa framework berat)
-   **Icons**: Font Awesome 6
-   **Fonts**: Google Fonts (Poppins)

---

## 💻 Cara Menjalankan Project (Local)

Jika Anda ingin menjalankan proyek ini di komputer lokal:

1.  **Clone Repository**:
    ```bash
    git clone https://github.com/ahlan130/ahlan-academic-system.git
    cd ahlan-academic-system
    ```

2.  **Install Dependencies**:
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**:
    - Salin `.env.example` menjadi `.env`
    - Buat file database kosong di `database/database.sqlite`

4.  **Migrate Database**:
    ```bash
    php artisan migrate
    php artisan storage:link
    ```

5.  **Jalankan Server**:
    ```bash
    php artisan serve
    ```
    Buka `http://127.0.0.1:8000` di browser.

---

## 👨‍💻 Kontributor
**Ahlan Ramadhani** - *STMIK IKMI CIREBON*

---
*Dibuat dengan ❤️ bantuan AI Assistant.*
