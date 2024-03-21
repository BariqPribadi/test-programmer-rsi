<!-- pasien.blade.php -->

@extends('layouts.main')

@section('container')

    <div class="mb-8 relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table id="table-pasien" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Jenis Kelamin
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Lahir
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Alamat
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Umur
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nama_pasien }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->jenis_kelamin_pasien === 'P')
                                Perempuan
                            @elseif ($item->jenis_kelamin_pasien === 'L')
                                Laki-Laki
                            @else
                                {{ $item->jenis_kelamin_pasien }}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tgl_lahir_pasien }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->alamat_pasien }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->umur_pasien }} Tahun
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('pasien.show', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Lihat</a>
                            <a href="{{ route('pasien.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a>
                            <form action="{{ route('pasien.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        <a href="{{ route('pasien.create') }}" class="px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-950">Tambah Pasien Baru</a>
        <button onclick="sortTableByUmur()" class="px-4 py-2 ml-4 bg-green-500 text-white rounded hover:bg-green-600">Urutkan Berdasarkan Umur</button>
    </div>

@endsection

@push('scripts')
<script>
    function sortTableByUmur() {
        const table = document.getElementById('table-pasien');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        rows.sort((a, b) => {
            const umurA = parseInt(a.cells[4].innerText);
            const umurB = parseInt(b.cells[4].innerText);
            return umurB - umurA;
        });

        rows.forEach(row => tbody.appendChild(row));
    }
</script>
@endpush
