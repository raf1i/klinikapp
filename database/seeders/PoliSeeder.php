<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Poli Gigi', 'biaya' => 100000],
            ['nama' => 'Poli Anak', 'biaya' => 150000],
            ['nama' => 'Poli Jantung', 'biaya' => 100000],
        ];
        \App\Models\Poli::insert($data);
    }
}
