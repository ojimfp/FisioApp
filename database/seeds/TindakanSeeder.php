<?php

use Illuminate\Database\Seeder;
use App\Tindakan;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tindakan::create([
            'kode_tindakan' => 'US1',
            'nama_tindakan' => 'Ultrasound (10 menit)',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0',
            'kategori_tindakan' => 'Low',
            'status_member' => 'Tidak',
            'status_aktif' => 'Ya'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG1',
            'nama_tindakan' => 'Massage 1 Lokal',
            'harga_jual' => '60000',
            'komisi_tindakan' => '0',
            'kategori_tindakan' => 'Low',
            'status_member' => 'Tidak',
            'status_aktif' => 'Ya'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'ES',
            'nama_tindakan' => 'Electrical Stimulation',
            'harga_jual' => '70000',
            'komisi_tindakan' => '0',
            'kategori_tindakan' => 'Low',
            'status_member' => 'Tidak',
            'status_aktif' => 'Ya'
        ]);
    }
}
