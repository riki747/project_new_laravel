<x-layouts.app :title="__('Inventaris')">
    <!-- create -->
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Barang Elektronik Laboratorium</flux:heading>
        <flux:subheading size="lg" class="mb-6">Tambah Barang</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
    <div class="mb-3 w-full rounded bg-lime-100 border border-lime-400 text-lime-800 px-4 py-3">
        {{ session()->get('successMessage') }}
    </div>
    @elseif(session()->has('errorMessage'))
    <flux:badge color="red" class="mb-3 w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif

    <form action="{{ route('inventaris.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <flux:input label="Name" name="nama_barang" class="mb-3" />

        <flux:input label="Kode Barang" name="kode_barang" class="mb-3" />

        <flux:input label="Kategori" name="kategori" class="mb-3" />

        <flux:input label="Merk" name="merk" class="mb-3" />

        <flux:input label="Nama Model" name="model" class="mb-3" />

        <flux:input label="Tahun Pembelian" name="tahun_pembelian" class="mb-3" />

        <flux:select label="Kondisi" name="kondisi" class="mb-5 text-center" >
            <option value="" disabled selected> ====== Pilih Kondisi ====== </option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </flux:select>

        <flux:input label="Jumlah" name="jumlah" type="number" class="mb-3" />

        <flux:input label="Lokasi Penyimpanan" name="lokasi_penyimpanan" class="mb-3" />

        <flux:textarea label="Keterangan" name="keterangan" class="mb-3" />

        <flux:separator variant="subtle" />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Save</flux:button>
            <flux:button href="{{ route('inventaris.index') }}" variant="ghost" class="ml-3">Back</flux:button>
        </div>
    </form>

</x-layouts.app>