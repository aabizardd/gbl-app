<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'nik' => '01',
                'nama_lengkap' => 'Ini Karyawan',
                'username' => 'karyawan',
                'email' => 'karyawan@gbl.com',
                'level' => 1,
                'password' => Hash::make('asdasd'),
            ],
            [
                'nik' => '02',
                'nama_lengkap' => 'Ini HRD',
                'username' => 'hrd',
                'email' => 'hrd@gbl.com',
                'level' => 2,
                'password' => Hash::make('asdasd'),
            ],
            [
                'nik' => '03',
                'nama_lengkap' => 'Ini Asman',
                'username' => 'asman',
                'email' => 'asman@gbl.com',
                'level' => 3,
                'password' => Hash::make('asdasd'),
            ],
            [
                'nik' => '04',
                'nama_lengkap' => 'Ini Admin',
                'username' => 'admin',
                'email' => 'admin@gbl.com',
                'level' => 4,
                'password' => Hash::make('asdasd'),
            ],
            [
                'nik' => '05',
                'nama_lengkap' => 'Ini Karyawan 2',
                'username' => 'karyawan2',
                'email' => 'karyawan2@gbl.com',
                'level' => 1,
                'password' => Hash::make('asdasd'),
            ],

        ]
        );
    }
}