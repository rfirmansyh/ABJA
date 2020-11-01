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
            'address' => json_encode(['provinsi' => 'Jawa Timur', 'kota' => 'Jember', 'kecamatan' => 'Panti', 'desa' => 'Kemiri', 'detail' => 'Jl. Teropong Bintang no. 11']),
            'status' => '1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'user_id' => '2'
        ];
        $budidayas[] = [
            'name' => 'Budidaya Jamur Sumber Jaya Lumajang',
            'photo' => 'photo/budidaya/default-default.png',
            'large' => 20.2,
            'address' => json_encode(['provinsi' => 'Jawa Timur', 'kota' => 'Lumajang', 'kecamatan' => 'Kaliwongso', 'desa' => 'Kantong', 'detail' => 'Jl. Bintang Bintang no. 11']),
            'status' => '0',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'user_id' => '2'
        ];
        DB::table('budidayas')->insert($budidayas);
        $this->command->info("Data Dummy Budidayas berhasil diinsert");
    }
}