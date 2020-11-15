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
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('pemasukans')->insert($pemasukans);
        $this->command->info("Data Dummy Pemasukan berhasil diinsert");
    }
}
