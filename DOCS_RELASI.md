# 📊 Skema Database & Alur Relasi (ERD)

Berikut adalah penjelasan teknis mengenai arsitektur database dan alur relasi yang telah dibangun pada proyek **Ahlan Academic System**.

---

## 1. Skema Database (ERD - Entity Relationship Diagram)

Sistem ini menggunakan relasi **Many-to-Many** (Banyak-ke-Banyak) karena dalam dunia nyata, seorang mahasiswa dapat mengambil banyak mata kuliah, dan satu mata kuliah dapat diikuti oleh banyak mahasiswa.

### Struktur Tabel:

#### **A. Tabel `mahasiswas`**
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | BigInt (PK) | Primary Key otomatis |
| `nim` | String (Unique) | Nomor Induk Mahasiswa |
| `nama` | String | Nama lengkap mahasiswa |
| `jurusan` | String | Program studi |
| `email` | String (Unique) | Alamat email aktif |
| `alamat` | Text | Alamat domisili |

#### **B. Tabel `mata_kuliahs`**
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | BigInt (PK) | Primary Key otomatis |
| `kode_mk` | String (Unique) | Kode unik mata kuliah |
| `nama_mk` | String | Nama mata kuliah |
| `sks` | Integer | Bobot SKS (Validasi 1-6) |

#### **C. Tabel Pivot `mahasiswa_mata_kuliah`**
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | BigInt (PK) | Primary Key |
| `mahasiswa_id` | Foreign Key | Relasi ke `mahasiswas.id` |
| `mata_kuliah_id` | Foreign Key | Relasi ke `mata_kuliahs.id` |

---

## 2. Alur Relasi (Relationship Flow)

Alur relasi dibangun menggunakan fitur **Eloquent ORM** di Laravel dengan langkah-langkah berikut:

1.  **Definisi Model**: 
    -   Di Model `Mahasiswa`, dibuat fungsi `mataKuliahs()` dengan return `$this->belongsToMany(MataKuliah::class)`.
    -   Di Model `MataKuliah`, dibuat fungsi `mahasiswas()` dengan return `$this->belongsToMany(Mahasiswa::class)`.
    -   Hal ini memungkinkan "pencarian dua arah" (Bi-directional).

2.  **Manajemen Relasi (UI)**:
    -   Saat mengedit data Mahasiswa, user disuguhkan daftar **Checkbox Mata Kuliah**.
    -   Data yang dicentang diproses oleh controller menggunakan fungsi `$mahasiswa->mataKuliahs()->sync($request->mata_kuliah)`. Fungsi `sync()` sangat cerdas karena otomatis menambah relasi baru dan menghapus relasi yang tidak dicentang.

3.  **Penampilan Data**:
    -   Pada halaman **Daftar Mata Kuliah**, terdapat tombol "Lihat Mahasiswa".
    -   Sistem menjalankan perintah `$matakuliah->load('mahasiswas')` untuk mengambil daftar nama mahasiswa yang terhubung melalui tabel pivot secara efisien.

---

## 3. Penjelasan Bantuan AI (AI Assistance)

Dalam pengerjaan ini, AI berperan dalam:
-   🎨 **Perancangan Skema**: AI merekomendasikan penggunaan tabel pivot untuk mendukung skalabilitas (Many-to-Many) alih-alih relasi sederhana.
-   🛠️ **Automasi Koding**: AI menghasilkan file migrasi, model, dan controller secara konsisten.
-   🛡️ **Validasi Data**: AI membantu menyusun aturan validasi `unique` dan `range` (SKS 1-6) agar database tetap bersih dari data sampah atau error.
-   🔄 **Sinkronisasi**: AI mengimplementasikan logika `sync()` di controller yang memastikan pengelolaan relasi via UI berjalan mulus tanpa duplikasi data.

---
*Dokumen ini disusun sebagai bagian dari bukti pengerjaan modul Akademik.*
