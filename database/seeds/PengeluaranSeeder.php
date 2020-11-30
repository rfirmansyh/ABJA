<?php

use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengeluarans = [];
        $pengeluarans[] = [
            'nominal' => 200000,
            'description' => 'Pembelian Bibit',
            'keuangan_id' => 1,
        ];
        $pengeluarans[] = [
            'nominal' => 50000,
            'description' => 'Pembelian Baglog 1 (ada yang rusak)',
            'keuangan_id' => 1,
        ];
        $pengeluarans[] = [
            'nominal' => 4000,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 2
        ];
        $pengeluarans[] = [
            'nominal' => 4500,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 2
        ];
        $pengeluarans[] = [
            'nominal' => 8000,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 3
        ];
        $pengeluarans[] = [
            'nominal' => 10000,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 4
        ];
        $pengeluarans[] = [
            'nominal' => 90000,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 5
        ];
        $pengeluarans[] = [
            'nominal' => 0,
            'description' => 'Pengeluaran dalam 1 Minggu',
            'keuangan_id' => 6
        ];
        DB::table('pengeluarans')->insert($pengeluarans);
        $this->command->info("Data Dummy Pengeluaran berhasil diinsert");
    }
}
