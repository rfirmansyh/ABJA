<?php

use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keuangans = [];
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 1',
            'description' => 'Deskripsi Data Keuangan Produksi 1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'production_id' => 1
        ];
        DB::table('keuangans')->insert($keuangans);
        $this->command->info("Data Dummy Keuangan berhasil diinsert");
    }
}
