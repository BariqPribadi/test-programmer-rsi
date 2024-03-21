<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'tbl_pasien'; 

    protected $fillable = [
        'nama_pasien', 'jenis_kelamin_pasien', 'tgl_lahir_pasien', 'alamat_pasien' 
    ];

    public function getUmurAttribute()
    {
        return $this->tgl_lahir_pasien->age;
    }

}
