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
        DB::table('pengeluarans')->insert($pengeluarans);
        $this->command->info("Data Dummy Pengeluaran berhasil diinsert");
    }
}
