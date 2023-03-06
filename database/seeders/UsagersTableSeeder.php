<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usagers')->insert([
            [   
                'email'=>'admin@mail.com',
                'password'=>Hash::make('admin'), 
                'nom'=>'admin',
                'prenom'=>'admin',
                'date_naissance'=>'2021-10-24',
            ]     
        ]);
    }
}
