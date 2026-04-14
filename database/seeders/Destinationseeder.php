<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Destination;

class Destinationseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => "Asia Heritage",
            'description' => "Asia Heritage termasuk salah satu ikon tempat wisata di Pekanbaru yang paling hits dan tidak boleh Anda lewatkan. Tempat ini menawarkan keseruan pengalaman mengunjungi 3 negara sekaligus yakni Korea, Jepang, dan Cina.",
            'location' => "Jl. Yos Sudarso, Muara Fajar, Rumbai, Kota Pekanbaru, Riau.",
            'working_days' => "Setiap Hari",
            'working_hours' => "8AM-6PM",
            'ticket_price' => "30000",
        ]);

        Destination::create([
            'name' => "Air Terjun Lubuk Batang",
            'description' => "Air Terjun Lubuk Batang di Jurong 2 Kec. Kapur Sembilan Kab., Koto Bangun, Kec. Kapur IX, Kabupaten Lima Puluh Kota, Sumatera Barat 28453, Indonesia. Informasi lengkap untuk Air Terjun Lubuk Batang, jam buka layanan, alamat lokasi, dan ulasan pengunjung di Air Terjun Lubuk Batang. Apakah anda mencari lokasi Air Terjun Lubuk Batang saat ini? April 2026",
            'location' => "Jurong 2 Kec. Kapur Sembilan Kab., Koto Bangun, Kec. Kapur IX, Kabupaten Lima Puluh Kota, Sumatera Barat 28453, Indonesia.",
            'working_days' => "Jurong 2 Kec. Kapur Sembilan Kab., Koto Bangun, Kec. Kapur IX, Kabupaten Lima Puluh Kota, Sumatera Barat 28453, Indonesia.",
            'working_hours' => "Setiap Hari",
            'ticket_price' => "15000 ",
        ]);

        Destination::create([
            'name' => "Taman Marga Satwa dan Budaya Kinantan",
            'description' => "Kebun Binatang Bukittinggi merupakan salah satu kebun binatang tertua di Indonesia. Dibangun pada awal 1900-an oleh Pemerintah Hindia Belanda, tempat ini awalnya bernama Stormpark atau Kebun Bunga. Gravenzande, seorang kontrolir Belanda, merancang taman ini karena terinspirasi oleh keindahan panorama Bukit Malambuang.",
            'location' => "Jl. Cindua Mato, Benteng Ps. Atas, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat",
            'working_days' => "everyday",
            'working_hours' => "8AM-6PM",
            'ticket_price' => "25000",
        ]);

        Destination::create([
            'name' => "Asia Farm",
            'description' => "",
            'location' => " Jalan Badak Ujung, Kelurahan Sail, Kecamatan Tenayan Raya, Kota Pekanbaru, Riau.",
            'working_days' => "everyday",
            'working_hours' => "9AM-6PM",
            'ticket_price' => "20000",
        ]);

        Destination::create([
            'name' => "Danau Maninjau",
            'description' => "Danau vulkanik yang terbentuk dari letusan gunung purba ini menawarkan panorama luar biasa dengan air tenang yang dikelilingi perbukitan hijau. Suasananya sejuk dan damai, cocok untuk bersantai, bersepeda, atau menikmati keindahan alam dari ketinggian.",
            'location' => "Kec. Tanjung Raya, Kab. Agam, Sumatera Barat, Indonesia",
            'working_days' => "Setiap Hari",
            'working_hours' => "08.00–17.00",
            'ticket_price' => "10000",
        ]);
        for($i = 0; $i <= 10; $i++) {
            Destination::create([
                'name' => fake("id_ID")->name(),
                'description' => fake("id_ID")->sentence(),
                'location' => fake("id_ID")->address() . ", pekanbaru, riau",
                'working_days' => "Everyday",
                'working_hours' => "8am-5pm",
                'ticket_price' => rand(10000, 50000),
            ]);
        }
    }
}
