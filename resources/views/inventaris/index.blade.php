<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-layouts.app :title="__('Inventaris')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Barang Elektronik Laboratorium</flux:heading>
        <flux:subheading size="lg" class="mb-6">Data Barang</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- search & add -->
    <div class="flex justify-between items-center mb-4">
        <div>
            <form action="{{ route('inventaris.index') }}" method="get">
                @csrf
                <flux:input icon="magnifying-glass" name="cari" value="{{ $cari }}" placeholder="Search Products" />
            </form>
        </div>
        <div>
            <flux:button icon="plus">
                <flux:link href="{{ route('inventaris.create') }}" variant="subtle">Add New Product</flux:link>
            </flux:button>
        </div>
    </div>

    <!-- notif -->
    @if (session('successMessage'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
        x-show="show" class="alert alert-success p-4 bg-green-100 text-green-800 rounded mb-4">
        {{ session('successMessage') }}
    </div>
    @endif


    <!-- table -->
    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="text-center">
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nama Barang
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Kode Barang
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Kategori
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Merk
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Model
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tahun Pembelian
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Kondisi
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Jumlah
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Lokasi Penyimpanan
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Keterangan
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tanggal
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $product)
                <tr class="bg-white hover:bg-gray-300 text-center">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->id }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->nama_barang }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->kode_barang }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->kategori }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->merk }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->model }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->tahun_pembelian }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->kondisi }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->jumlah }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->lokasi_penyimpanan }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->keterangan }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $product->created_at->format('d-m-Y H:i') }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-center text-sm">
                        <flux:dropdown>
                            <flux:button icon:trailing="chevron-down">Actions</flux:button>
                            <flux:menu>
                                <flux:menu.item icon="pencil" href="{{ route('inventaris.edit', $product->id) }}">Edit</flux:menu.item>

                                <flux:menu.item icon="trash" variant="danger"
                                    onclick="event.preventDefault(); confirmDelete({{ $product->id }})">
                                    Delete
                                </flux:menu.item>
                                <form id="delete-form-{{ $product->id }}" action="{{ route('inventaris.destroy', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </flux:menu>
                        </flux:dropdown>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- pagination -->
    <div class="mt-6">
        {{ $data->links('vendor.pagination.custom-tailwind') }}
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus sekarang!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form setelah user klik 'Ya'
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

</x-layouts.app>