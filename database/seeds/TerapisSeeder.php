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
            'spesialisasi' => 'Penyembuh'
        ]);
        Dokter::create([
            'nama_dokter' => 'Neko, S.Kom',
            'spesialisasi' => 'Pijat Kucing'
        ]);
        Dokter::create([
            'nama_dokter' => 'Thor, M.Fis',
            'spesialisasi' => 'Tukang Setrum'
        ]);
    }
}
