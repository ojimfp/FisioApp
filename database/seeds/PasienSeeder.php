<?php

use Illuminate\Database\Seeder;
use App\Pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasien::create([
            'nama' => 'Bambang Bucin',
            'alamat' => 'Jl. Ramen no. 9',
            'kota' => 'Konoha',
            'jenis_kelamin' => 'Pria',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Shinobi',
            'tempat_lahir' => 'Konoha',
            'tgl_lahir' => '1973-09-11',
            'no_telp' => '081234567890',
            'email' => 'bambang.bcn@gmail.com'
        ]);
        Pasien::create([
            'nama' => 'Cemong',
            'alamat' => 'Jl. Kucing no. 2',
            'kota' => 'Surabaya',
            'jenis_kelamin' => 'Wanita',
            'status_perkawinan' => 'Kawin',
            'pekerjaan' => 'Kucing',
            'tempat_lahir' => 'Surabaya',
            'tgl_lahir' => '2015-05-20',
            'no_telp' => '089876543210',
            'email' => 'cemong@gmail.com'
        ]);
    }
}
