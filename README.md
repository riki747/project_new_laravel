
# Inventaris Lab Elektronik

Repositori ini berisi **sistem manajemen inventaris barang elektronik** untuk lab, dikembangkan dengan menggunakan teknologi web modern dengan fokus pada performa, skalabilitas, dan kemudahan penggunaan.

---

## Menggunakan :
- **Laravel 12** — PHP Framework untuk backend
- **Livewire** — Untuk antarmuka interaktif berbasis komponen
- **FluxUI** — UI Framework berbasis Tailwind CSS
- **MySQL** — Sistem manajemen basis data
- **Vite** — Asset bundler modern untuk frontend
  
## Fitur

- CRUD Barang Elektronik
- Validasi input
- Tampilan interaktif dengan Livewire & FluxUI
- Pengelolaan data inventaris 

---

##  Cara Menjalankan Proyek

```bash
1. Clone Repository
git clone https://github.com/riki747/project_new_laravel.git
cd project_new_laravel

2. Instalasi Laravel (Opsional jika belum)
composer global require laravel/installer
composer install

3. Konfigurasi Environment
cp .env.example .env
* sesuaikan .env dengan database MySQL Anda:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_lab
DB_USERNAME=root
DB_PASSWORD=

4. Generate app key:
php artisan key:generate

5. Jika menggunakan db_fake (Opsional)
php artisan make:seeder namaseed
php artisan db:seed

6. Jalankan migrasi untuk membuat tabel
php artisan migrate

7. Instalasi NPM dan Build
npm install
npm run dev

8. Menjalankan Aplikasi
php artisan serve
```


