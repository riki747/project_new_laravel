<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarangElektronik;
use Faker\Factory as Faker;

class BarangElektronikSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            BarangElektronik::create([
                'nama_barang' => $faker->unique()->words(2, true),
                'kode_barang' => strtoupper($faker->unique()->bothify('???###')),
                'kategori' => $faker->randomElement(['Laptop', 'Proyektor', 'Printer', 'Scanner']),
                'merk' => $faker->company,
                'model' => $faker->bothify('Model-##??'),
                'tahun_pembelian' => $faker->year,
                'kondisi' => $faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
                'jumlah' => $faker->numberBetween(1, 10),
                'lokasi_penyimpanan' => $faker->city,
                'keterangan' => $faker->sentence,
            ]);
        }
    }
}