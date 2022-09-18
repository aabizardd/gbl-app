<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            [
                'id' => 99,
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'jenis_kelamin' => 'Laki-laki',
                'bagian_id' => 1,
                'jabatan_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 98,
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2000-10-12',
                'agama' => 'Katolik',
                'jenis_kelamin' => 'Laki-laki',
                'bagian_id' => 1,
                'jabatan_id' => 1,
                'user_id' => 5,
            ],

        ]
        );
    }
}