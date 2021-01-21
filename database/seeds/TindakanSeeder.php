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
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE2',
            'nama_tindakan' => 'Laser Enraf Lokal 2',
            'harga_jual' => '55000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE3',
            'nama_tindakan' => 'Laser Enraf Lokal 3',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE4',
            'nama_tindakan' => 'Laser Enraf Lokal 4',
            'harga_jual' => '85000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LE5',
            'nama_tindakan' => 'Laser Enraf Lokal 5',
            'harga_jual' => '100000',
        ]);

        // Laser Lot per Menit
        Tindakan::create([
            'kode_tindakan' => 'LOT2',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '30000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT4',
            'nama_tindakan' => 'Laser Lot per 4 Menit',
            'harga_jual' => '50000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT6',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'LOT8',
            'nama_tindakan' => 'Laser Lot per 2 Menit',
            'harga_jual' => '90000',
        ]);

        // Exercise
        Tindakan::create([
            'kode_tindakan' => 'EXE R',
            'nama_tindakan' => 'Exercise Ringan (15 Menit)',
            'harga_jual' => '60000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'EXE S',
            'nama_tindakan' => 'Exercise Sedang (30 Menit)',
            'harga_jual' => '90000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'EXE F',
            'nama_tindakan' => 'Exercise Full (60 Menit)',
            'harga_jual' => '150000',
        ]);

        // unknown
        Tindakan::create([
            'kode_tindakan' => 'LT',
            'nama_tindakan' => 'LT 15 Menit',
            'harga_jual' => '50000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'CT',
            'nama_tindakan' => 'CT 15 Menit',
            'harga_jual' => '50000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'QE',
            'nama_tindakan' => 'QE 15 Menit',
            'harga_jual' => '45000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MT',
            'nama_tindakan' => 'MT',
            'harga_jual' => '50000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG MT',
            'nama_tindakan' => 'Massage + MT',
            'harga_jual' => '95000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'IR',
            'nama_tindakan' => 'Infrared',
            'harga_jual' => '45000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'IC',
            'nama_tindakan' => 'Icing',
            'harga_jual' => '20000',
        ]);

        // Ultrasound
        Tindakan::create([
            'kode_tindakan' => 'US1',
            'nama_tindakan' => 'Ultrasound 10 Menit',
            'harga_jual' => '50000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US2',
            'nama_tindakan' => 'Ultrasound 15 Menit',
            'harga_jual' => '65000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US3',
            'nama_tindakan' => 'Ultrasound 20 Menit',
            'harga_jual' => '80000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US4',
            'nama_tindakan' => 'Ultrasound 25 Menit',
            'harga_jual' => '95000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US5',
            'nama_tindakan' => 'Ultrasound 30 Menit',
            'harga_jual' => '110000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US6',
            'nama_tindakan' => 'Ultrasound 35 Menit',
            'harga_jual' => '125000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US7',
            'nama_tindakan' => 'Ultrasound 40 Menit',
            'harga_jual' => '140000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US8',
            'nama_tindakan' => 'Ultrasound 45 Menit',
            'harga_jual' => '155000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US9',
            'nama_tindakan' => 'Ultrasound 50 Menit',
            'harga_jual' => '170000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US10',
            'nama_tindakan' => 'Ultrasound 55 Menit',
            'harga_jual' => '185000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US11',
            'nama_tindakan' => 'Ultrasound 60 Menit',
            'harga_jual' => '200000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'US12',
            'nama_tindakan' => 'Ultrasound 10 Menit',
            'harga_jual' => '215000',
        ]);

        // Massage per Lokal
        Tindakan::create([
            'kode_tindakan' => 'MSG1',
            'nama_tindakan' => 'Massage 1 Lokal',
            'harga_jual' => '60000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG2',
            'nama_tindakan' => 'Massage 2 Lokal',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG3',
            'nama_tindakan' => 'Massage 3 Lokal',
            'harga_jual' => '80000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG4',
            'nama_tindakan' => 'Massage 4 Lokal',
            'harga_jual' => '90000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG5',
            'nama_tindakan' => 'Massage 5 Lokal',
            'harga_jual' => '100000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG6',
            'nama_tindakan' => 'Massage 6 Lokal',
            'harga_jual' => '110000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG7',
            'nama_tindakan' => 'Massage 7 Lokal',
            'harga_jual' => '120000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG8',
            'nama_tindakan' => 'Massage 8 Lokal',
            'harga_jual' => '130000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG9',
            'nama_tindakan' => 'Massage 9 Lokal',
            'harga_jual' => '140000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG10',
            'nama_tindakan' => 'Massage 10 Lokal',
            'harga_jual' => '150000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSG11',
            'nama_tindakan' => 'Head Massage',
            'harga_jual' => '135000',
        ]);

        //MASSAGE BABY
        Tindakan::create([
            'kode_tindakan' => 'MSGBB1',
            'nama_tindakan' => 'Massage Baby 0-6 Bulan',
            'harga_jual' => '60000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB2',
            'nama_tindakan' => 'Massage Baby 6-1 tahun',
            'harga_jual' => '65000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB3',
            'nama_tindakan' => 'Massage Baby 1-2 tahun',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB4',
            'nama_tindakan' => 'Massage Baby 2-3 tahun',
            'harga_jual' => '75000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB5',
            'nama_tindakan' => 'Massage Baby 3-4 tahun',
            'harga_jual' => '80000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB6',
            'nama_tindakan' => 'Massage Baby 4-5 tahun',
            'harga_jual' => '85000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB7',
            'nama_tindakan' => 'Massage Baby 5-6 tahun',
            'harga_jual' => '90000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB7FULL',
            'nama_tindakan' => 'Massage Baby 5-6 tahun (Full)',
            'harga_jual' => '130000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB8',
            'nama_tindakan' => 'Massage Baby 6-7 tahun',
            'harga_jual' => '95000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB8FULL',
            'nama_tindakan' => 'Massage Baby 6-7 tahun (Full)',
            'harga_jual' => '135000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB9',
            'nama_tindakan' => 'Massage Baby 7-8 tahun',
            'harga_jual' => '100000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB9FULL',
            'nama_tindakan' => 'Massage Baby 7-8 tahun (Full)',
            'harga_jual' => '140000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB10',
            'nama_tindakan' => 'Massage Baby 8-9 tahun',
            'harga_jual' => '105000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB10FULL',
            'nama_tindakan' => 'Massage Baby 8-9 tahun (Full)',
            'harga_jual' => '145000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB11',
            'nama_tindakan' => 'Massage Baby 9-10 tahun',
            'harga_jual' => '110000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'MSGBB11FULL',
            'nama_tindakan' => 'Massage Baby 9-10 tahun (Full)',
            'harga_jual' => '150000',
        ]);

        //SWD
        Tindakan::create([
            'kode_tindakan' => 'SWD1',
            'nama_tindakan' => 'SWD 15 Menit',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD2',
            'nama_tindakan' => 'SWD 20 Menit',
            'harga_jual' => '85000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD3',
            'nama_tindakan' => 'SWD 25 Menit',
            'harga_jual' => '100000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD4',
            'nama_tindakan' => 'SWD 30 Menit',
            'harga_jual' => '115000',
        ]);

        //SINUSITIS
        Tindakan::create([
            'kode_tindakan' => 'SWDSINUS1',
            'nama_tindakan' => 'SWD Sinus 15 Menit',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWDSINUS2',
            'nama_tindakan' => 'SWD Sinus 30 Menit',
            'harga_jual' => '130000',
        ]);

        //SWT
        Tindakan::create([
            'kode_tindakan' => 'SWT1',
            'nama_tindakan' => 'SWT Lokal 1',
            'harga_jual' => '70000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD2',
            'nama_tindakan' => 'SWT Lokal 2',
            'harga_jual' => '85000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD3',
            'nama_tindakan' => 'SWT Lokal 3',
            'harga_jual' => '100000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD4',
            'nama_tindakan' => 'SWD Lokal 4',
            'harga_jual' => '115000',
        ]);
        Tindakan::create([
            'kode_tindakan' => 'SWD5',
            'nama_tindakan' => 'SWD Lokal 5',
            'harga_jual' => '130000',
        ]);
    }
}
