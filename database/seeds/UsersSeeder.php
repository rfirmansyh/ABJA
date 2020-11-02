<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = [];
        $users[] = [
            'name' => 'Rahmad Firmansyah',
            'photo' => 'photo/profile/default-admin.png',
            'email' => 'fsyah7052@gmail.com',
            'password' =>  bcrypt('123123'),
            'phone' => '085748572354',
            'bio' => 'Saya adalah Administrator Dari Abja',
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'deleted_at' => null,
            'role_id' => '1'
        ];
        $users[] = [
            'name' => 'Febria Erliana',
            'photo' => 'photo/profile/default-mitra.png',
            'email' => 'fsyah7025@gmail.com',
            'password' =>  bcrypt('123123'),
            'phone' => '085123456789',
            'bio' => 'Saya adalah Mitra Dari Abja',
            'provinsi' => 'JAWA TIMUR',
            'kabupaten' => 'JEMBER',
            'kecamatan' => 'PANTI',
            'kelurahan' => 'KEMIRI',
            'detail_address' => 'JL. Teropong Bintang no.6',
            'status' => '0',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'deleted_at' => null,
            'role_id' => '2'
        ];
        DB::table('users')->insert($users);
        $this->command->info("Data Dummy Users berhasil diinsert");
    }
}
