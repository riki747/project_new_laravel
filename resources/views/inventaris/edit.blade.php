<x-layouts.app :title="__('Inventaris')">
    <!-- header -->
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Barang Elektronik Laboratorium</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit Barang</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- notif -->
    @if(session()->has('successMessage'))
    <div class="mb-3 w-full rounded bg-lime-100 border border-lime-400 text-lime-800 px-4 py-3">
        {{ session()->get('successMessage') }}
    </div>
    @elseif(session()->has('errorMessage'))
    <flux:badge color="red" class="mb-3 w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif

    <!-- table -->
    <form action="{{ route('inventaris.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <flux:input label="Name" name="nama_barang" value="{{ old('nama_barang', $data->nama_barang) }}" class="mb-3" />
        <flux:input label="Kode Barang" name="kode_barang" value="{{ old('kode_barang', $data->kode_barang) }}" class="mb-3" />
        <flux:input label="Kategori" name="kategori" value="{{ old('kategori', $data->kategori) }}" class="mb-3" />
        <flux:input label="Merk" name="merk" value="{{ old('merk', $data->merk) }}" class="mb-3" />
        <flux:input label="Nama Model" name="model" value="{{ old('model', $data->model) }}" class="mb-3" />
        <flux:input label="Tahun Pembelian" name="tahun_pembelian" value="{{ old('tahun_pembelian', $data->tahun_pembelian) }}" class="mb-3" />
        <flux:select label="Kondisi" name="kondisi" class="mb-5 text-center">
            <option value="" disabled selected> ====== Pilih Kondisi ====== </option>
            <option value="Baik" {{ old('kondisi', $data->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi', $data->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi', $data->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </flux:select>
        <flux:input label="Jumlah" name="jumlah" type="number" value="{{ old('jumlah', $data->jumlah) }}" class="mb-3" />
        <flux:input label="Lokasi Penyimpanan" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $data->lokasi_penyimpanan) }}" class="mb-3" />
        <flux:textarea label="Keterangan" name="keterangan" class="mb-3">{{ old('keterangan', $data->keterangan) }}</flux:textarea>
        <flux:separator variant="subtle" />
        
        <!-- buton -->
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:button href="{{ route('inventaris.index') }}" variant="ghost" class="ml-3">Back</flux:button>
        </div>
    </form>
</x-layouts.app>