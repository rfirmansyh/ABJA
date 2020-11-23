<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productions = [];
        $productions[] = [
            'name' => 'Produksi Sehari-hari 1',
            'description' => 'Produksi Pertama pada kumbung ini',
            'created_at' => Carbon::now()->subDays(8)->addSeconds(30)->addMinutes(23)->toDateTimeString(),
            'updated_at' => null,
            'done_at' => Carbon::now()->subDays(1)->toDateTimeString(),
            'harvest_total' => null,
            'production_type_id' => 1,
            'maked_by_uid' => 3,
            'updated_by_uid' => 3,
            'kumbung_id' => 1
        ];
        $productions[] = [
            'name' => 'Produksi Sehari-hari 2',
            'description' => 'Produksi Kedua pada kumbung ini',
            'created_at' => Carbon::create(2000, 11, 3, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'done_at' => null,
            'harvest_total' => null,
            'production_type_id' => 1,
            'maked_by_uid' => 3,
            'updated_by_uid' => 3,
            'kumbung_id' => 1
        ];
        DB::table('productions')->insert($productions);
        $this->command->info("Data Dummy Produksi berhasil diinsert");
    }
}
