<?php

namespace Database\Seeders;

use App\Models\SetKeahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class SetKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();
        for ($i = 0; $i <= 10; $i++) {
            $keahlian = new SetKeahlian;
            $keahlian->nama = $faker->randomElement([
                'Web Developer','Application Developer',
                'UI/UX Designer','Full Stack Developer','Komunikasi',
                'Kerja Sama','Berpikir Kritis','Negosiasi','Sopir'
            
            ]);
          
            $keahlian->save();
        
        }
    }
}
