@extends('layouts.main')

@section('container')
    <div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white">
                <h2 class="text-xl font-semibold mb-4">Tambah Pasien Baru</h2>
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_pasien" class="block text-gray-700 font-semibold mb-1">Nama Pasien:</label>
                        <input type="text" name="nama_pasien" id="nama_pasien" class="bg-gray-100 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin_pasien" class="block text-gray-700 font-semibold mb-1">Jenis Kelamin:</label>
                        <select name="jenis_kelamin_pasien" id="jenis_kelamin_pasien" class="bg-gray-100 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tgl_lahir_pasien" class="block text-gray-700 font-semibold mb-1">Tanggal Lahir:</label>
                        <input type="date" name="tgl_lahir_pasien" id="tgl_lahir_pasien" class="bg-gray-100 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat_pasien" class="block text-gray-700 font-semibold mb-1">Alamat Pasien:</label>
                        <textarea name="alamat_pasien" id="alamat_pasien" class="bg-gray-100 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required></textarea>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
                        <a href="{{ route('pasien.index') }}" class="px-4 py-2 ml-2 border border-gray-300 rounded hover:bg-gray-100">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
