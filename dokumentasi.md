# 📘 Dokumentasi Struktur Model & Relasi

**Proyek:** Sistem Pencarian Manga  
**Framework:** Laravel + Filament  
**Lingkungan:** Docker + WSL + VS Code

---

## 📁 1. Tabel: `mangas`

**Deskripsi:** Menyimpan data utama tentang manga.

|Kolom|Tipe Data|Keterangan|
|---|---|---|
|`id`|BIGINT|Primary Key (Auto Increment)|
|`title`|VARCHAR|Judul manga|
|`synopsis`|TEXT|Deskripsi atau sinopsis manga|
|`cover_image`|VARCHAR|URL path ke gambar cover|
|`status`|ENUM|`ongoing` atau `completed`|
|`published_at`|DATE|Tanggal terbit pertama|
|`created_at`|TIMESTAMP|Otomatis (Laravel default)|
|`updated_at`|TIMESTAMP|Otomatis (Laravel default)|

### 🔁 Relasi:

- **`manga_author`** (Many-to-Many ke `authors`)
    
- **`genre_manga`** (Many-to-Many ke `genres`)

## 📁 2. Tabel: `authors`

**Deskripsi:** Menyimpan informasi tentang penulis manga.

| Kolom        | Tipe Data       | Keterangan       |
| ------------ | --------------- | ---------------- |
| `id`         | BIGINT          | Primary Key      |
| `name`       | VARCHAR         | Nama penulis     |
| `bio`        | TEXT (nullable) | Biografi singkat |
| `created_at` | TIMESTAMP       | Otomatis         |
| `updated_at` | TIMESTAMP       | Otomatis         |

### 🔁 Relasi:

- **`manga_author`** (Many-to-Many ke `mangas`)

## 📁 3. Tabel: `genres`

**Deskripsi:** Menyimpan daftar genre manga.

|Kolom|Tipe Data|Keterangan|
|---|---|---|
|`id`|BIGINT|Primary Key|
|`name`|VARCHAR|Nama genre (contoh: Action)|
|`slug`|VARCHAR|Nama genre dalam format URL|
|`created_at`|TIMESTAMP|Otomatis|
|`updated_at`|TIMESTAMP|Otomatis|

## 🔗 Tabel Pivot Relasi Many-to-Many

### 📄 Tabel: `author_manga`

| Kolom       | Tipe Data | Keterangan                  |
| ----------- | --------- | --------------------------- |
| `manga_id`  | BIGINT    | Foreign Key ke `mangas.id`  |
| `author_id` | BIGINT    | Foreign Key ke `authors.id` |
**Relasi:**

- `Manga` ↔ `Author` (Many-to-Many)

### 📄 Tabel: `genre_manga`

|Kolom|Tipe Data|Keterangan|
|---|---|---|
|`manga_id`|BIGINT|Foreign Key ke `mangas.id`|
|`genre_id`|BIGINT|Foreign Key ke `genres.id`|

**Relasi:**

- `Manga` ↔ `Genre` (Many-to-Many)

