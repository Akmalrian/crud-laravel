# CRUD API Produk (Laravel)

REST API sederhana untuk mengelola data produk (Create, Read, Update, Delete)
menggunakan PHP Laravel dan MySQL.

## Kebutuhan

- PHP 8.3 atau lebih baru
- Composer
- MySQL

## Cara Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Buat database `crud_laravel` di MySQL, sesuaikan `DB_USERNAME` dan
`DB_PASSWORD` di file `.env`, lalu jalankan:

```bash
php artisan migrate
php artisan serve
```

API dapat diakses di `http://localhost:8000/api/products`.

## Struktur Data Produk

| Field       | Tipe    | Aturan                          |
|-------------|---------|---------------------------------|
| name        | string  | wajib, min 3, maks 255 karakter |
| price       | integer | wajib, minimal 0                |
| description | text    | opsional                        |

## Endpoint

| Method    | URL                  | Fungsi                       |
|-----------|----------------------|------------------------------|
| GET       | /api/products        | Daftar produk (10 per halaman) |
| POST      | /api/products        | Tambah produk                |
| GET       | /api/products/{id}   | Detail produk                |
| PUT/PATCH | /api/products/{id}   | Ubah produk                  |
| DELETE    | /api/products/{id}   | Hapus produk                 |

Gunakan header `Accept: application/json` pada setiap request.
Halaman berikutnya diakses dengan `?page=2`.

## Contoh

**POST /api/products**

```json
{
    "name": "Mouse",
    "price": 50000,
    "description": "Mouse wireless"
}
```

Response (201):

```json
{
    "success": true,
    "message": "Produk berhasil ditambahkan",
    "data": {
        "name": "Mouse",
        "price": 50000,
        "description": "Mouse wireless",
        "updated_at": "2026-10-22T07:11:14.000000Z",
        "created_at": "2026-10-22T07:11:14.000000Z",
        "id": 1
    }
}
```

Response validasi gagal (422): berisi pesan error per field.
Response data tidak ditemukan (404): berisi pesan "No query results".