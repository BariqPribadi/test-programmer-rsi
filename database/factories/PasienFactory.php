<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tgl_lahir = $this->faker->date;
        $umur = now()->diffInYears($tgl_lahir);

        return [
            'nama_pasien' => $this->faker->name,
            'jenis_kelamin_pasien' => $this->faker->randomElement(['L', 'P']),
            'tgl_lahir_pasien' => $tgl_lahir,
            'alamat_pasien' => $this->faker->address,
            'umur_pasien' => $umur,
        ];
    }
}
