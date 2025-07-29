<?php

namespace App\Http\Controllers;

use App\Models\BarangElektronik;
use Illuminate\Http\Request;

class BarangElektronikController extends Controller
{
    public function index(Request $request)
    {
       // Menangani parameter pencarian dengan default kosong
        $cari = $request->get('cari', ''); 

        // Mencari produk berdasarkan nama dan deskripsi jika ada pencarian
        $data = BarangElektronik::when($cari, function ($query, $cari) {
            return $query->where('nama_barang', 'like', "%{$cari}%")
                         ->orWhere('kode_barang', 'like', "%{$cari}%");
        })->paginate(10); // Menampilkan hasil produk dengan pagination
        
        return view('inventaris.index', compact('data', 'cari'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik',
            'kode_barang' => 'required|unique:barang_elektronik',
            'kategori' => 'required',
            'merk' => 'nullable',
            'model' => 'nullable',
            'tahun_pembelian' => 'required|integer|min:2000|max:' . date('Y'),
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
            'lokasi_penyimpanan' => 'required',
            'keterangan' => 'nullable',
        ]);

        BarangElektronik::create($validated);
        return redirect()->route('inventaris.index')->with('successMessage', 'Data berhasil ditambahkan!');
    }

    public function show(BarangElektronik $barangElektronik)
    {
        //
    }

    public function edit(BarangElektronik $barangElektronik, $id)
    {
        $data = BarangElektronik::findOrFail($id);
        return view('inventaris.edit', compact('data'));
    }

    public function update(Request $request, BarangElektronik $barangElektronik, $id)
    {
       $data = BarangElektronik::findOrFail($id);

        $validated = $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik,nama_barang,' . $data->id,
            'kode_barang' => 'required|unique:barang_elektronik,kode_barang,' . $data->id,
            'kategori' => 'required',
            'merk' => 'nullable',
            'model' => 'nullable',
            'tahun_pembelian' => 'required|integer|min:2000|max:' . date('Y'),
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
            'lokasi_penyimpanan' => 'required',
            'keterangan' => 'nullable',
        ]);

        $data->update($validated);
        return redirect()->route('inventaris.index')->with('successMessage', 'Data berhasil diubah!');
    }

    public function destroy(BarangElektronik $barangElektronik, $id)
    {
        // Menghapus data berdasarkan ID
        $data = BarangElektronik::findOrFail($id);
        $data->delete();

        return redirect()->route('inventaris.index')
       ->with('successMessage', 'Data berhasil dihapus!');
    }
}
