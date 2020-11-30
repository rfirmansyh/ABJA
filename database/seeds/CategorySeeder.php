<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $categories[] = [
            'name' => 'Pembelian Jamur',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
        ];
        $categories[] = [
            'name' => 'Penyakit Jamur',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
        ];
        $categories[] = [
            'name' => 'Kabar Harian Jamur',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
        ];
        DB::table('categories')->insert($categories);
        $this->command->info("Data Dummy Category berhasil diinsert");
    }
}
