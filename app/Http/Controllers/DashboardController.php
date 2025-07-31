<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil total barang unik berdasarkan kode_barang
        $totalBarang = DB::table('barang_elektronik')
            ->select(DB::raw('COUNT(DISTINCT kode_barang) as total_barang'))
            ->first()
            ->total_barang;
        // Menghitung jumlah barang berdasarkan kategori
        $totalKategori = DB::table('barang_elektronik')
            ->select(DB::raw('COUNT(DISTINCT kategori) as jumlah_kategori_unik'))
            ->value('jumlah_kategori_unik');
        // Menghitung jumlah barang berdasarkan kondisi
        $totalKondisiBaik =  DB::table('barang_elektronik')
            ->where('kondisi', 'Baik')
            ->count();
        $totalKondisiRusakRingan =  DB::table('barang_elektronik')
            ->where('kondisi', 'Rusak Ringan')
            ->count();
        $totalKondisiRusakBerat = DB::table('barang_elektronik')
            ->where('kondisi', 'Rusak Berat')
            ->count();


        return view('dashboard', compact('totalBarang', 'totalKategori', 'totalKondisiBaik', 'totalKondisiRusakRingan', 'totalKondisiRusakBerat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
