<?php

use Illuminate\Database\Seeder;

class ProductiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $production_types = [];
        $production_types[] = [
            'name' => 'Produksi Untuk Penjualan',
            'description' => 'Produksi Ini dilakukan untuk penjualan rutin',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'user_id' => 2
        ];
        $production_types[] = [
            'name' => 'Produksi Pesananan',
            'description' => 'Produksi Ini dilakukan untuk tujuan pesanan dalam jumlah yang banyak',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'user_id' => 2
        ];
        $production_types[] = [
            'name' => 'Produksi Konsumsi',
            'description' => 'Produksi Ini dilakukan untuk Non Profit atau konsumsi untuk sendiri/keluarga',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'user_id' => 2
        ];
        DB::table('production_types')->insert($production_types);
        $this->command->info("Data Dummy Production Tipe berhasil diinsert");
    }
}
