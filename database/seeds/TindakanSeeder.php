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
        // Laser Enraf
        Tindakan::create([
            'kode_tindakan' => 'LE1',
            'nama_tindakan' => 'Laser Enraf Lokal 1',
            'harga_jual' => '40000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE2',
            'nama_tindakan' => 'Laser Enraf Lokal 2',
            'harga_jual' => '55000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE3',
            'nama_tindakan' => 'Laser Enraf Lokal 3',
            'harga_jual' => '70000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE4',
            'nama_tindakan' => 'Laser Enraf Lokal 4',
            'harga_jual' => '85000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE5',
            'nama_tindakan' => 'Laser Enraf Lokal 5',
            'harga_jual' => '100000',
            'komisi_tindakan' => '0'
        ]);

        // Laser Lot per Menit
        Tindakan::create([
            'kode_tindakan' => 'LOT2',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '30000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT4',
            'nama_tindakan' => 'Laser Lot per 4 Menit',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT6',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '70000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT8',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '90000',
            'komisi_tindakan' => '0'
        ]);

        // Exercise
        Tindakan::create([
            'kode_tindakan' => 'EXE R',
            'nama_tindakan' => 'Exercise Ringan (15 Menit)',
            'harga_jual' => '60000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'EXE S',
            'nama_tindakan' => 'Exercise Sedang (30 Menit)',
            'harga_jual' => '90000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'EXE F',
            'nama_tindakan' => 'Exercise Full (60 Menit)',
            'harga_jual' => '150000',
            'komisi_tindakan' => '0'
        ]);

        // unknown
        Tindakan::create([
            'kode_tindakan' => 'LT',
            'nama_tindakan' => 'LT 15 Menit',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'CT',
            'nama_tindakan' => 'CT 15 Menit',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'QE',
            'nama_tindakan' => 'QE 15 Menit',
            'harga_jual' => '45000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MT',
            'nama_tindakan' => 'MT',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG MT',
            'nama_tindakan' => 'Massage + MT',
            'harga_jual' => '95000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'IR',
            'nama_tindakan' => 'Infrared',
            'harga_jual' => '45000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'IC',
            'nama_tindakan' => 'Icing',
            'harga_jual' => '20000',
            'komisi_tindakan' => '0'
        ]);

        // Ultrasound
        Tindakan::create([
            'kode_tindakan' => 'US1',
            'nama_tindakan' => 'Ultrasound 10 Menit',
            'harga_jual' => '50000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US2',
            'nama_tindakan' => 'Ultrasound 15 Menit',
            'harga_jual' => '65000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US3',
            'nama_tindakan' => 'Ultrasound 20 Menit',
            'harga_jual' => '80000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US4',
            'nama_tindakan' => 'Ultrasound 25 Menit',
            'harga_jual' => '95000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US5',
            'nama_tindakan' => 'Ultrasound 30 Menit',
            'harga_jual' => '110000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US6',
            'nama_tindakan' => 'Ultrasound 35 Menit',
            'harga_jual' => '125000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US7',
            'nama_tindakan' => 'Ultrasound 40 Menit',
            'harga_jual' => '140000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US8',
            'nama_tindakan' => 'Ultrasound 45 Menit',
            'harga_jual' => '155000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US9',
            'nama_tindakan' => 'Ultrasound 50 Menit',
            'harga_jual' => '170000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US10',
            'nama_tindakan' => 'Ultrasound 55 Menit',
            'harga_jual' => '185000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US11',
            'nama_tindakan' => 'Ultrasound 60 Menit',
            'harga_jual' => '200000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US12',
            'nama_tindakan' => 'Ultrasound 10 Menit',
            'harga_jual' => '215000',
            'komisi_tindakan' => '0'
        ]);

        // Massage per Lokal
        Tindakan::create([
            'kode_tindakan' => 'MSG1',
            'nama_tindakan' => 'Massage 1 Lokal',
            'harga_jual' => '60000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG2',
            'nama_tindakan' => 'Massage 2 Lokal',
            'harga_jual' => '70000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG3',
            'nama_tindakan' => 'Massage 3 Lokal',
            'harga_jual' => '80000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG4',
            'nama_tindakan' => 'Massage 4 Lokal',
            'harga_jual' => '90000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG5',
            'nama_tindakan' => 'Massage 5 Lokal',
            'harga_jual' => '100000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG6',
            'nama_tindakan' => 'Massage 6 Lokal',
            'harga_jual' => '110000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG7',
            'nama_tindakan' => 'Massage 7 Lokal',
            'harga_jual' => '120000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG8',
            'nama_tindakan' => 'Massage 8 Lokal',
            'harga_jual' => '130000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG9',
            'nama_tindakan' => 'Massage 9 Lokal',
            'harga_jual' => '140000',
            'komisi_tindakan' => '0'
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG10',
            'nama_tindakan' => 'Massage 10 Lokal',
            'harga_jual' => '150000',
            'komisi_tindakan' => '0'
        ]);
    }
}
