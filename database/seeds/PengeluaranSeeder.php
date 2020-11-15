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
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $pengeluarans[] = [
            'nominal' => 50000,
            'description' => 'Pembelian Baglog 1 (ada yang rusak)',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('pengeluarans')->insert($pengeluarans);
        $this->command->info("Data Dummy Pengeluaran berhasil diinsert");
    }
}
