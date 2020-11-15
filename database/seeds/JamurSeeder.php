<?php

use Illuminate\Database\Seeder;

class JamurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jamurs = [];
        $jamurs[] = [
            'photo' => 'jamur/default-jamur.png',
            'name' => 'Jamur Merang',
            'description' => 'Tubuh buah yang masih muda berbentuk bulat telur, berwarna cokelat gelap hingga abu-abu dan dilindungi selubung. Pada tubuh buah jamur merang dewasa, tudung berkembang seperti cawan berwarna coklat tua keabu-abuan dengan bagian batang berwarna coklat muda. Jamur merang yang dijual untuk keperluan konsumsi adalah tubuh buah yang masih muda yang tudungnya belum berkembang. Jamur merang dibudidayakan di dalam bangunan yang disebut kumbung. Sesuai namanya jamur ini tumbuh baik pada media merang dan jerami yang telah terkomposkan. Namun praktik budidaya lebih lanjut juga mendapati jamur ini tumbuh baik pada kompos sampah kertas, tandan kosong sawit, kompos batang pisang dan kompos bio massa pada umumnya. Menurut penelitian, limbah kapas adalah media yang memberikan hasil produksi dan pertumbuhan yang terbaik bagi jamur merang. Jamur merang dikenal sebagai warm mushroom, hidup dan mampu bertahan pada suhu yang relatif tinggi, antara 30-38 °C dengan suhu optimum pada 35 °C.',
            'status' => '1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $jamurs[] = [
            'photo' => 'jamur/default-jamur.png',
            'name' => 'Jamur Merang',
            'description' => 'Tubuh buah jamur tiram memiliki tangkai yang tumbuh menyamping (bahasa Latin: pleurotus) dan bentuknya seperti tiram (ostreatus) sehingga jamur tiram mempunyai nama binomial Pleurotus ostreatus.[2] Bagian tudung dari jamur tersebut berubah warna dari hitam, abu-abu, coklat, hingga putih, dengan permukaan yang hampir licin, diameter 5–20 cm yang bertepi tudung mulus sedikit berlekuk.[1] Selain itu, jamur tiram juga memiliki spora berbentuk batang berukuran 8-11×3-4μm serta miselia berwarna putih yang bisa tumbuh dengan cepat.[1] Di alam bebas, jamur tiram bisa dijumpai hampir sepanjang tahun di hutan pegunungan daerah yang sejuk.[3] Tubuh buah terlihat saling bertumpuk di permukaan batang pohon yang sudah melapuk atau pokok batang pohon yang sudah ditebang karena jamur tiram adalah salah satu jenis jamur kayu.[3] Untuk itu, saat ingin membudidayakan jamur ini, substrat yang dibuat harus memperhatikan habitat alaminya.[4] Media yang umum dipakai untuk membiakkan jamur tiram adalah serbuk gergaji kayu yang merupakan limbah dari penggergajian kayu.',
            'status' => '1',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('jamurs')->insert($jamurs);
        $this->command->info("Data Dummy Jamur berhasil diinsert");
    }
}
