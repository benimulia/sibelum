<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'name' => 'Eka Sri Sugianti',
            'email' => 'ekasrisugianti93@gmail.com',
            'level' => 'pegawai',
            'password' => bcrypt('123456789')
        ],
        [
            'name' => 'Eka Sri',
            'email' => 'eka.sri@si.ukdw.ac.id',
            'level' => 'manager',
            'password' => bcrypt('123456789')
        ]
    ];
    foreach ($user as $key => $value) {
        User::create($value);
    }
    }
}
