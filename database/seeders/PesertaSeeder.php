<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Peserta::create(
        [
            'name' => 'Mikha',
            'registration_number' => '111111'
        ]
    );

    }
}
