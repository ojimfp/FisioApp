<?php

use Illuminate\Database\Seeder;
use App\Dokter;

class TerapisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'nama_dokter' => 'Healer',
            'hp' => '08111111',
            'gaji_pokok' => 40000
        ]);
        Dokter::create([
            'nama_dokter' => 'Neko, S.Kom',
            'hp' => '019919191',
            'gaji_pokok' => 30000
        ]);
        Dokter::create([
            'nama_dokter' => 'Thor, M.Fis',
            'hp' => '9292292',
            'gaji_pokok' => 10000
        ]);
    }
}
