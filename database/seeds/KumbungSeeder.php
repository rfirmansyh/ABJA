<?php

use Illuminate\Database\Seeder;

class KumbungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kumbungs = [];
        $kumbungs[] = [
            'name' => 'Kumbung A1',
            'photo' => 'kumbung/default-kumbung.png',
            'large' => 22.2,
            'status' => 1,
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'jamur_id' => 1,
            'budidaya_id' => 1
        ];
        $kumbungs[] = [
            'name' => 'Kumbung A2',
            'photo' => 'kumbung/default-kumbung.png',
            'large' => 8.2,
            'status' => 1,
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'jamur_id' => 1,
            'budidaya_id' => 1
        ];
        DB::table('kumbungs')->insert($kumbungs);
        $this->command->info("Data Dummy Kumbung berhasil diinsert");
    }
}
