<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangElektronik extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'barang_elektronik';

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori',
        'merk',
        'model',
        'tahun_pembelian',
        'kondisi',
        'jumlah',
        'lokasi_penyimpanan',
        'keterangan',
    ];
}
