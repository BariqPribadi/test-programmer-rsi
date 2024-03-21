<!-- resources/views/pasien_umur.blade.php -->
@extends('layouts.main')

@section('container')
    <div class="mb-8 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                    <th scope="col" class="px-6 py-3">Umur</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $pasien->nama_pasien }}</td>
                        <td class="px-6 py-4">{{ $pasien->jenis_kelamin_pasien === 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
                        <td class="px-6 py-4">{{ $pasien->tgl_lahir_pasien->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">{{ $pasien->umur }} tahun</td>
                        <td class="px-6 py-4">{{ $pasien->alamat_pasien }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
