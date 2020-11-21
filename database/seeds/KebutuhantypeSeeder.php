<?php

use Illuminate\Database\Seeder;

class KebutuhantypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kebutuhan_types = [];
        $kebutuhan_types[] = [
            'name' => 'Bibit',
            'unit' => 'gram',
            'description' => 'Dibutuhkan saat awal produksi',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $kebutuhan_types[] = [
            'name' => 'Backlog',
            'unit' => 'buah',
            'description' => 'Dibutuhkan Jumlah Saat Produksi',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('kebutuhan_types')->insert($kebutuhan_types);
        $this->command->info("Data Dummy Tipe Kebutuhan berhasil diinsert");
    }
}
