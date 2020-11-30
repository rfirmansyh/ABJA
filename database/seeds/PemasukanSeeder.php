<?php

use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pemasukans = [];
        $pemasukans[] = [
            'nominal' => 200000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 1
        ];
        $pemasukans[] = [
            'nominal' => 50000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 2
        ];
        $pemasukans[] = [
            'nominal' => 60000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 2
        ];
        $pemasukans[] = [
            'nominal' => 10000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 3
        ];
        $pemasukans[] = [
            'nominal' => 10000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 4
        ];
        $pemasukans[] = [
            'nominal' => 90000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 5
        ];
        $pemasukans[] = [
            'nominal' => 10000,
            'description' => 'Hasil Penjualan dalam 1 Minggu',
            'keuangan_id' => 6
        ];
        DB::table('pemasukans')->insert($pemasukans);
        $this->command->info("Data Dummy Pemasukan berhasil diinsert");
    }
}
