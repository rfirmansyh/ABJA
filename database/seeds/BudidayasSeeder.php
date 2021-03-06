<?php

use Illuminate\Database\Seeder;

class BudidayasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $budidayas = [];
        $budidayas[] = [
            'name' => 'Budidaya Jamur Sumber Jaya Jember',
            'photo' => 'photo/budidaya/default-default.png',
            'large' => 10.2,
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'owned_by_uid' => '2',
            'maintenance_by_uid' => '4'
        ];
        $budidayas[] = [
            'name' => 'Budidaya Jamur Sumber Jaya Lumajang',
            'photo' => 'photo/budidaya/default-default.png',
            'large' => 20.2,
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '0',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'owned_by_uid' => '2',
            'maintenance_by_uid' => null
        ];
        $budidayas[] = [
            'name' => 'Budidaya Jamur Sumber Jaya Jember',
            'photo' => 'photo/budidaya/default-default.png',
            'large' => 20.2,
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '0',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'owned_by_uid' => '3',
            'maintenance_by_uid' => '5'
        ];
        $budidayas[] = [
            'name' => 'Budidaya Jamur Sumber Jaya Jember',
            'photo' => 'photo/budidaya/default-default.png',
            'large' => 20.2,
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '0',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'owned_by_uid' => '3',
            'maintenance_by_uid' => '5'
        ];
        DB::table('budidayas')->insert($budidayas);
        $this->command->info("Data Dummy Budidayas berhasil diinsert");
    }
}
