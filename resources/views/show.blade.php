@extends('layouts.main')

@section('container')
    <div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-slate-900">
                <h2 class="text-xl text-gray-400 font-semibold mb-4">Detail Pasien</h2>
                <div class="mb-4">
                    <strong class="block text-gray-400 font-semibold mb-1">Nama:</strong>
                    <div class="bg-gray-600 rounded">
                        <span class="text-gray-200 p-2">{{ $pasien->nama_pasien }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-400 font-semibold mb-1">Jenis Kelamin:</strong>
                    <div class="bg-gray-600 rounded">
                        <span class="text-gray-200 p-2">
                            @if($pasien->jenis_kelamin_pasien === 'P')
                                Perempuan
                            @else
                                Laki-Laki
                            @endif
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-400 font-semibold mb-1">Tanggal Lahir:</strong>
                    <div class="bg-gray-600 rounded">
                        <span class="text-gray-200 p-2">{{ $pasien->tgl_lahir_pasien }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-400 font-semibold mb-1">Umur:</strong>
                    <div class="bg-gray-600 rounded">
                        <span class="text-gray-200 p-2">{{ \Carbon\Carbon::parse($pasien->tgl_lahir_pasien)->age }} tahun</span>
                    </div>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-400 font-semibold mb-1">Alamat:</strong>
                    <div class="bg-gray-600 rounded">
                        <span class="text-gray-200 p-2">{{ $pasien->alamat_pasien }}</span>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
