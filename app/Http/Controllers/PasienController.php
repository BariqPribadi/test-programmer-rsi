<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use Illuminate\Http\Request;
use DateTime;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien', compact('pasiens'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin_pasien' => 'required|in:L,P',
            'tgl_lahir_pasien' => 'required|date_format:Y-m-d',
            'alamat_pasien' => 'required',
        ]);

        // Hitung umur berdasarkan tanggal lahir
        $tgl_lahir_pasien = new DateTime($request->tgl_lahir_pasien);
        $umur_pasien = $tgl_lahir_pasien->diff(new DateTime(now()))->y;

        // Buat entri baru ke dalam database
        $pasien = new Pasien();
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin_pasien = $request->jenis_kelamin_pasien;
        $pasien->tgl_lahir_pasien = $request->tgl_lahir_pasien;
        $pasien->alamat_pasien = $request->alamat_pasien;
        $pasien->umur_pasien = $umur_pasien; // Masukkan umur ke dalam entri baru
        $pasien->save();

        return redirect()->route('pasien.index')
                        ->with('success', 'Pasien berhasil ditambahkan.');
    }



    public function show(Pasien $pasien)
    {
        return view('show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
{
    $request->validate([
        'nama_pasien' => 'required',
        'jenis_kelamin_pasien' => 'required|in:L,P',
        'tgl_lahir_pasien' => 'required|date_format:Y-m-d',
        'alamat_pasien' => 'required',
    ]);

    // Hitung umur baru berdasarkan tanggal lahir yang baru
    $tgl_lahir_pasien = new DateTime($request->tgl_lahir_pasien);
    $umur_pasien = $tgl_lahir_pasien->diff(new DateTime(now()))->y;

    // Simpan umur baru ke dalam model Pasien
    $pasien->nama_pasien = $request->nama_pasien;
    $pasien->jenis_kelamin_pasien = $request->jenis_kelamin_pasien;
    $pasien->tgl_lahir_pasien = $request->tgl_lahir_pasien;
    $pasien->alamat_pasien = $request->alamat_pasien;
    $pasien->umur_pasien = $umur_pasien;

    // Simpan model Pasien
    $pasien->save();

    return redirect()->route('pasien.index')
                     ->with('success', 'Data pasien berhasil diperbarui.');
}


    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')
                         ->with('success', 'Pasien berhasil dihapus.');
    }

    // PasienController.php

    public function indexSortedByUmur()
    {
        $pasiens = Pasien::orderBy('umur_pasien', 'desc')->get();
        return view('pasien', compact('pasiens'));
    }



}