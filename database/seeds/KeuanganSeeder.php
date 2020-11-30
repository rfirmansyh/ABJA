<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 1',
            'description' => 'Deskripsi Data Keuangan Produksi 1',
            'created_at' => Carbon::create(2020, 9, 20, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'production_id' => 3
        ];
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 2',
            'description' => 'Deskripsi Data Keuangan Produksi 2',
            'created_at' => Carbon::create(2020, 10, 20, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'production_id' => 4
        ];
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 3',
            'description' => 'Deskripsi Data Keuangan Produksi 2',
            'created_at' => Carbon::create(2020, 11, 20, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'production_id' => 5
        ];
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 4',
            'description' => 'Deskripsi Data Keuangan Produksi 2',
            'created_at' => Carbon::create(2020, 12, 20, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'production_id' => 6
        ];
        $keuangans[] = [
            'name' => 'Data Keuangan Produksi 5',
            'description' => 'Deskripsi Data Keuangan Produksi 2',
            'created_at' => Carbon::create(2021, 1, 20, 9, 51, 16)->toDateTimeString(),
            'updated_at' => null,
            'production_id' => 7
        ];
        DB::table('keuangans')->insert($keuangans);
        $this->command->info("Data Dummy Keuangan berhasil diinsert");
    }
}
