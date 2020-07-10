<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusans = array(
            array(
                "id" => 1014,
                "nama" => "Teknik Survei dan Pemetaan-K06",
            ),
            array(
                "id" => 1023,
                "nama" => "Teknik Gambar Bangunan-K06",
            ),
            array(
                "id" => 1027,
                "nama" => "Desain Pemodelan dan Informasi Bangunan-K13-rev",
            ),
            array(
                "id" => 1049,
                "nama" => "Teknik Konstruksi Batu dan Beton-K06",
            ),
            array(
                "id" => 1051,
                "nama" => "Bisnis Konstruksi dan Properti-K13-rev",
            ),
            array(
                "id" => 1058,
                "nama" => "Teknik Konstruksi Baja-K06",
            ),
            array(
                "id" => 1076,
                "nama" => "Teknik Konstruksi Kayu-K06",
            ),
            array(
                "id" => 1079,
                "nama" => "Konstruksi Jalan, Irigasi dan Jembatan-K13-rev",
            ),
            array(
                "id" => 1085,
                "nama" => "Teknik Furnitur-K06",
            ),
            array(
                "id" => 1094,
                "nama" => "Teknik Plambing dan Sanitasi-K06",
            ),
            array(
                "id" => 1097,
                "nama" => "Konstruksi Gedung, Sanitasi dan Perawatan-K13-rev",
            ),
            array(
                "id" => 1103,
                "nama" => "Teknik Instalasi Tenaga Listrik-K06",
            ),
            array(
                "id" => 1104,
                "nama" => "Teknik Instalasi Tenaga Listrik-K13-rev",
            ),
            array(
                "id" => 1112,
                "nama" => "Teknik Distribusi Tenaga Listrik-K06",
            ),
            array(
                "id" => 1156,
                "nama" => "Teknik Transmisi Tenaga Listrik-K06",
            ),
            array(
                "id" => 1165,
                "nama" => "Teknik Pembangkit Tenaga Listrik-K06",
            ),
            array(
                "id" => 1174,
                "nama" => "Teknik Audio -Video-K06",
            ),
            array(
                "id" => 1192,
                "nama" => "Teknik Elektronika  Industri-K06",
            ),
            array(
                "id" => 1194,
                "nama" => "Teknik Elektronika Daya dan Komunikasi-K13-rev",
            ),
            array(
                "id" => 1196,
                "nama" => "Instrumentasi Medik-K13-rev",
            ),
            array(
                "id" => 1218,
                "nama" => "Teknik Pendinginan dan Tata Udara-K06",
            ),
            array(
                "id" => 1227,
                "nama" => "Teknik Pengelasan-K06",
            ),
            array(
                "id" => 1236,
                "nama" => "Teknik Fabrikasi Logam-K06",
            ),
            array(
                "id" => 1239,
                "nama" => "Teknik Fabrikasi Logam dan Manufaktur-K13-rev",
            ),
            array(
                "id" => 1245,
                "nama" => "Teknik Pengecoran Logam-K06",
            ),
            array(
                "id" => 1254,
                "nama" => "Teknik Pemesinan-K06",
            ),
            array(
                "id" => 1263,
                "nama" => "Teknik Pemeliharaan Mekanik Industri-K06",
            ),
            array(
                "id" => 1267,
                "nama" => "Teknik Mekanik Industri-K13-rev",
            ),
            array(
                "id" => 1272,
                "nama" => "Teknik Gambar Mesin-K06",
            ),
            array(
                "id" => 1275,
                "nama" => "Teknik Perancangan dan Gambar Mesin-K13-rev",
            ),
            array(
                "id" => 1289,
                "nama" => "Teknik Kendaraan Ringan-K06",
            ),
            array(
                "id" => 1291,
                "nama" => "Teknik Kendaraan Ringan Otomotif-K13-rev",
            ),
            array(
                "id" => 1298,
                "nama" => "Teknik Alat Berat-K06",
            ),
            array(
                "id" => 1307,
                "nama" => "Teknik Perbaikan Bodi Otomotif-K06",
            ),
            array(
                "id" => 1309,
                "nama" => "Teknik Bodi Otomotif-K13-rev",
            ),
            array(
                "id" => 1316,
                "nama" => "Teknik Sepeda Motor-K06",
            ),
            array(
                "id" => 1319,
                "nama" => "Teknik dan Bisnis Sepeda Motor-K13-rev",
            ),
            array(
                "id" => 1325,
                "nama" => "Pemesinan Pesawat Udara-K06",
            ),
            array(
                "id" => 1334,
                "nama" => "Konstruksi Rangka Pesawat Udara-K06",
            ),
            array(
                "id" => 1343,
                "nama" => "Konstruksi Badan Pesawat Udara-K06",
            ),
            array(
                "id" => 1352,
                "nama" => "Air Frame dan Power Plant-K06",
            ),
            array(
                "id" => 1369,
                "nama" => "Pemeliharaan dan Perbaikan Instrumen Elektronika Pesawat Udara-K06",
            ),
            array(
                "id" => 1371,
                "nama" => "Electrical Avionics-K13-rev",
            ),
            array(
                "id" => 1378,
                "nama" => "Kelistrikan Pesawat Udara-K06",
            ),
            array(
                "id" => 1387,
                "nama" => "Elektronika Pesawat Udara-K06",
            ),
            array(
                "id" => 1396,
                "nama" => "Teknik Konstruksi Kapal Baja-K06",
            ),
            array(
                "id" => 1399,
                "nama" => "Konstruksi Kapal Baja-K13-rev",
            ),
            array(
                "id" => 1405,
                "nama" => "Teknik Pengelasan Kapal-K06",
            ),
            array(
                "id" => 1409,
                "nama" => "Konstruksi Kapal Non Baja-K13-rev",
            ),
            array(
                "id" => 1414,
                "nama" => "Teknik Instalasi Pemesinan Kapal-K06",
            ),
            array(
                "id" => 1417,
                "nama" => "Teknik Pemesinan Kapal-K13-rev",
            ),
            array(
                "id" => 1423,
                "nama" => "Kelistrikan Kapal-K06",
            ),
            array(
                "id" => 1426,
                "nama" => "Teknik Kelistrikan Kapal-K13-rev",
            ),
            array(
                "id" => 1432,
                "nama" => "Teknik Gambar Rancang Bangun Kapal-K06",
            ),
            array(
                "id" => 1435,
                "nama" => "Desain dan Rancang Bangun Kapal-K13-rev",
            ),
            array(
                "id" => 1449,
                "nama" => "Teknik Konstruksi Kapal Kayu-K06",
            ),
            array(
                "id" => 1458,
                "nama" => "Interior Kapal-K06",
            ),
            array(
                "id" => 1485,
                "nama" => "Teknik Pemintalan Serat Buatan-K06",
            ),
            array(
                "id" => 1494,
                "nama" => "Teknik Pembuatan Benang-K06",
            ),
            array(
                "id" => 1503,
                "nama" => "Teknik Pembuatan Kain-K06",
            ),
            array(
                "id" => 1512,
                "nama" => "Teknik Penyempurnaan Tekstil-K06",
            ),
            array(
                "id" => 1538,
                "nama" => "Persiapan Grafika-K06",
            ),
            array(
                "id" => 1541,
                "nama" => "Desain  Grafika-K13-rev",
            ),
            array(
                "id" => 1547,
                "nama" => "Produksi Grafika-K06",
            ),
            array(
                "id" => 1556,
                "nama" => "Geologi Pertambangan-K06",
            ),
            array(
                "id" => 1574,
                "nama" => "Kontrol Proses-K06",
            ),
            array(
                "id" => 1583,
                "nama" => "Kontrol Mekanik-K06",
            ),
            array(
                "id" => 1585,
                "nama" => "Instrumentasi dan Otomatisasi Proses-K13-rev",
            ),
            array(
                "id" => 1592,
                "nama" => "Teknik Instrumentasi Logam-K06",
            ),
            array(
                "id" => 1609,
                "nama" => "Kimia Industri-K06",
            ),
            array(
                "id" => 1625,
                "nama" => "Analisis Pengujian Laboratorium-K13-rev",
            ),
            array(
                "id" => 1627,
                "nama" => "Kimia Analisis-K06",
            ),
            array(
                "id" => 1639,
                "nama" => "Kimia Tekstil-K13-rev",
            ),
            array(
                "id" => 1645,
                "nama" => "Nautika Kapal Niaga-K06",
            ),
            array(
                "id" => 1654,
                "nama" => "Teknika Kapal Niaga-K06",
            ),
            array(
                "id" => 1663,
                "nama" => "Nautika Kapal Penangkap Ikan-K06",
            ),
            array(
                "id" => 1672,
                "nama" => "Teknika Kapal Penangkap Ikan-K06",
            ),
            array(
                "id" => 1707,
                "nama" => "Teknik Mekatronika-K06",
            ),
            array(
                "id" => 1725,
                "nama" => "Teknik Pemboran Minyak-K06",
            ),
            array(
                "id" => 1734,
                "nama" => "Teknik Pengolahan Minyak, Gas dan Petro Kimia-K06",
            ),
            array(
                "id" => 1743,
                "nama" => "Teknik Otomasi Industri-K06",
            ),
            array(
                "id" => 1746,
                "nama" => "Teknik Tenaga Listrik-K13-rev",
            ),
            array(
                "id" => 1752,
                "nama" => "Teknik Ototronik-K06",
            ),
            array(
                "id" => 1754,
                "nama" => "Teknik dan Manajemen Perawatan Otomotif-K13-rev",
            ),
            array(
                "id" => 1757,
                "nama" => "Otomotif Daya dan Konversi Energi-K13-rev",
            ),
            array(
                "id" => 1769,
                "nama" => "Teknik dan Manajemen Transportasi-K06",
            ),
            array(
                "id" => 1778,
                "nama" => "Teknik Konstruksi Kapal Fiberglass-K06",
            ),
            array(
                "id" => 1787,
                "nama" => "Teknik dan Manajemen Produksi-K06",
            ),
            array(
                "id" => 1796,
                "nama" => "Teknik dan Manajemen Pergudangan-K06",
            ),
            array(
                "id" => 1807,
                "nama" => "Teknik Geomatika-K13-rev",
            ),
            array(
                "id" => 1809,
                "nama" => "Informasi Geospasial-K13-rev",
            ),
            array(
                "id" => 1834,
                "nama" => "Airframe Power Plant-K13-rev",
            ),
            array(
                "id" => 1851,
                "nama" => "Teknik Pengendalian Produksi-K13-rev",
            ),
            array(
                "id" => 1861,
                "nama" => "Teknik Logistik-K13-rev",
            ),
            array(
                "id" => 1869,
                "nama" => "Teknik Pemboran Minyak dan Gas-K13-rev",
            ),
            array(
                "id" => 1878,
                "nama" => "Teknik Pengolahan Minyak, Gas dan Petrokimia-K13-rev",
            ),
            array(
                "id" => 1887,
                "nama" => "Teknik Produksi Minyak dan Gas-K13-rev",
            ),
            array(
                "id" => 1915,
                "nama" => "Teknik Energi Surya, Hidro, dan Angin-K13-rev",
            ),
            array(
                "id" => 1931,
                "nama" => "Teknik Energi Biomassa-K13-rev",
            ),
            array(
                "id" => 2027,
                "nama" => "Teknik Jaringan Akses-K06",
            ),
            array(
                "id" => 2029,
                "nama" => "Teknik Jaringan Akses Telekomunikasi-K13-rev",
            ),
            array(
                "id" => 2036,
                "nama" => "Teknik Suitsing-K06",
            ),
            array(
                "id" => 2045,
                "nama" => "Teknik Transmisi Telekomunikasi-K06",
            ),
            array(
                "id" => 2063,
                "nama" => "Teknik Komputer dan Jaringan-K06",
            ),
            array(
                "id" => 2072,
                "nama" => "Rekayasa Perangkat Lunak-K06",
            ),
            array(
                "id" => 2089,
                "nama" => "Multi Media-K06",
            ),
            array(
                "id" => 2091,
                "nama" => "Sistem Informatika, Jaringan dan Aplikasi-K13-rev",
            ),
            array(
                "id" => 2098,
                "nama" => "Teknik Produksi dan Penyiaran Program Radio-K06",
            ),
            array(
                "id" => 2107,
                "nama" => "Teknik Produksi dan Penyiaran Program Pertelevisian-K06",
            ),
            array(
                "id" => 2116,
                "nama" => "Animasi-K06",
            ),
            array(
                "id" => 2127,
                "nama" => "Produksi dan Siaran Program Radio-K13-rev",
            ),
            array(
                "id" => 2131,
                "nama" => "Produksi dan Siaran Program Televisi-K13-rev",
            ),
            array(
                "id" => 2136,
                "nama" => "Rekayasa Perangkat Lunak-K13-rev",
            ),
            array(
                "id" => 2139,
                "nama" => "Produksi Film dan Program Televisi-K13-rev",
            ),
            array(
                "id" => 2141,
                "nama" => "Produksi Film-K13-rev",
            ),
            array(
                "id" => 2145,
                "nama" => "Teknik Komputer dan Jaringan-K13-rev",
            ),
            array(
                "id" => 2154,
                "nama" => "Multimedia-K13-rev",
            ),
            array(
                "id" => 2171,
                "nama" => "Teknik Transmisi Telekomunikasi-K13-rev",
            ),
            array(
                "id" => 3014,
                "nama" => "Keperawatan-K06",
            ),
            array(
                "id" => 3016,
                "nama" => "Asisten Keperawatan-K13-rev",
            ),
            array(
                "id" => 3023,
                "nama" => "Keperawatan Gigi-K06",
            ),
            array(
                "id" => 3025,
                "nama" => "Dental Asisten-K13-rev",
            ),
            array(
                "id" => 3032,
                "nama" => "Analisis Kesehatan-K06",
            ),
            array(
                "id" => 3035,
                "nama" => "Teknologi Laboratorium Medik-K13-rev",
            ),
            array(
                "id" => 3049,
                "nama" => "Farmasi-K06",
            ),
            array(
                "id" => 3051,
                "nama" => "Farmasi Klinis dan Komunitas-K13-rev",
            ),
            array(
                "id" => 3058,
                "nama" => "Perawatan Sosial-K06",
            ),
            array(
                "id" => 3061,
                "nama" => "Social Care (Keperawatan Sosial)-K13-rev",
            ),
            array(
                "id" => 3065,
                "nama" => "Caregiver-K13-rev",
            ),
            array(
                "id" => 3067,
                "nama" => "Farmasi Industri-K06",
            ),
            array(
                "id" => 3125,
                "nama" => "Farmasi Industri-K13-rev",
            ),
            array(
                "id" => 4036,
                "nama" => "Seni Patung-K06",
            ),
            array(
                "id" => 4054,
                "nama" => "Seni Lukis-K06",
            ),
            array(
                "id" => 4063,
                "nama" => "Desain dan Produksi Kria Tekstil-K06",
            ),
            array(
                "id" => 4065,
                "nama" => "Kriya Kreatif Batik dan Tekstil-K13-rev",
            ),
            array(
                "id" => 4072,
                "nama" => "Desain dan Produksi Kria Kulit-K06",
            ),
            array(
                "id" => 4075,
                "nama" => "Kriya Kreatif Kulit dan Imitasi-K13-rev",
            ),
            array(
                "id" => 4089,
                "nama" => "Desain dan Produksi Kria Keramik-K06",
            ),
            array(
                "id" => 4091,
                "nama" => "Kriya Kreatif Keramik-K13-rev",
            ),
            array(
                "id" => 4098,
                "nama" => "Desain dan Produksi Kria Logam-K06",
            ),
            array(
                "id" => 4102,
                "nama" => "Kriya Kreatif Logam dan Perhiasan-K13-rev",
            ),
            array(
                "id" => 4107,
                "nama" => "Desain dan Produksi Kria Kayu-K06",
            ),
            array(
                "id" => 4109,
                "nama" => "Kriya Kreatif Kayu dan Rotan-K13-rev",
            ),
            array(
                "id" => 4125,
                "nama" => "Seni  Musik  Non Klasik-K06",
            ),
            array(
                "id" => 4128,
                "nama" => "Seni Musik Populer-K13-rev",
            ),
            array(
                "id" => 4132,
                "nama" => "Seni Tari-K13-rev",
            ),
            array(
                "id" => 4134,
                "nama" => "Seni Tari Jawatimuran-seni etnis",
            ),
            array(
                "id" => 4143,
                "nama" => "Seni Tari Makasar-seni etnis",
            ),
            array(
                "id" => 4152,
                "nama" => "Seni Tari Minang-seni etnis",
            ),
            array(
                "id" => 4159,
                "nama" => "Penataan Tari-K13-rev",
            ),
            array(
                "id" => 4163,
                "nama" => "Seni Pedalangan-K13-rev",
            ),
            array(
                "id" => 4169,
                "nama" => "Seni Pedalangan Yogyakarta-seni etnis",
            ),
            array(
                "id" => 4178,
                "nama" => "Seni Pedalangan Surakarta-seni etnis",
            ),
            array(
                "id" => 4187,
                "nama" => "Seni Pedalangan Jawatimuran-seni etnis",
            ),
            array(
                "id" => 4196,
                "nama" => "Seni Pedalangan Bali-seni etnis",
            ),
            array(
                "id" => 4205,
                "nama" => "Seni Tari Sunda-seni etnis",
            ),
            array(
                "id" => 4214,
                "nama" => "Seni Tari Bali-seni etnis",
            ),
            array(
                "id" => 4223,
                "nama" => "Seni Tari Surakarta-seni etnis",
            ),
            array(
                "id" => 4232,
                "nama" => "Seni Tari Yogyakarta-seni etnis",
            ),
            array(
                "id" => 4249,
                "nama" => "Seni Tari Banyumasan-seni etnis",
            ),
            array(
                "id" => 4258,
                "nama" => "Seni Karawitan Jawatimuran-seni etnis",
            ),
            array(
                "id" => 4267,
                "nama" => "Seni Karawitan Makassar-seni etnis",
            ),
            array(
                "id" => 4276,
                "nama" => "Seni Karawitan Minang-seni etnis",
            ),
            array(
                "id" => 4285,
                "nama" => "Seni Karawitan Sunda-seni etnis",
            ),
            array(
                "id" => 4294,
                "nama" => "Seni Karawitan Surakarta-seni etnis",
            ),
            array(
                "id" => 4303,
                "nama" => "Seni Karawitan Yogyakarta-seni etnis",
            ),
            array(
                "id" => 4312,
                "nama" => "Seni Karawitan Bali-seni etnis",
            ),
            array(
                "id" => 4329,
                "nama" => "Seni Karawitan Banyumasan-seni etnis",
            ),
            array(
                "id" => 4331,
                "nama" => "Penataan Karawitan-K13-rev",
            ),
            array(
                "id" => 4338,
                "nama" => "Seni Teater-K06",
            ),
            array(
                "id" => 4347,
                "nama" => "Desain Komunikasi Visual-K06",
            ),
            array(
                "id" => 4365,
                "nama" => "Seni Musik Klasik-K06",
            ),
            array(
                "id" => 4409,
                "nama" => "Usaha Perjalanan Wisata-K06",
            ),
            array(
                "id" => 4418,
                "nama" => "Akomodasi Perhotelan-K06",
            ),
            array(
                "id" => 4421,
                "nama" => "Perhotelan-K13-rev",
            ),
            array(
                "id" => 4424,
                "nama" => "Wisata Bahari dan Ekowisata-K13-rev",
            ),
            array(
                "id" => 4426,
                "nama" => "Hotel dan Restoran-K13-rev",
            ),
            array(
                "id" => 4427,
                "nama" => "Jasa Boga-K06",
            ),
            array(
                "id" => 4436,
                "nama" => "Patiseri-K06",
            ),
            array(
                "id" => 4438,
                "nama" => "Tata Boga-K13-rev",
            ),
            array(
                "id" => 4445,
                "nama" => "Kecantikan Kulit-K06",
            ),
            array(
                "id" => 4453,
                "nama" => "Seni Karawitan-K13-rev",
            ),
            array(
                "id" => 4454,
                "nama" => "Kecantikan Rambut-K06",
            ),
            array(
                "id" => 4457,
                "nama" => "Tata Kecantikan Kulit dan Rambut-K13-rev",
            ),
            array(
                "id" => 4459,
                "nama" => "Spa dan Beauty Therapy-K13-rev",
            ),
            array(
                "id" => 4463,
                "nama" => "Busana Butik-K06",
            ),
            array(
                "id" => 4472,
                "nama" => "Desain Produk Interior dan Landscaping-K06",
            ),
            array(
                "id" => 4489,
                "nama" => "Seni Tari Betawi-seni etnis",
            ),
            array(
                "id" => 4498,
                "nama" => "Seni Karawitan Betawi-seni etnis",
            ),
            array(
                "id" => 4509,
                "nama" => "Pemeranan-K13-rev",
            ),
            array(
                "id" => 4518,
                "nama" => "Tata Artistik Teater-K13-rev",
            ),
            array(
                "id" => 4526,
                "nama" => "Tata Busana-K13-rev",
            ),
            array(
                "id" => 4527,
                "nama" => "Desain Fesyen-K13-rev",
            ),
            array(
                "id" => 4537,
                "nama" => "Desain Interior dan Teknik Furnitur-K13-rev",
            ),
            array(
                "id" => 4545,
                "nama" => "Usaha Perjalanan Wisata-K13-rev",
            ),
            array(
                "id" => 4609,
                "nama" => "Seni Lukis-K13-rev",
            ),
            array(
                "id" => 4627,
                "nama" => "Desain Komunikasi Visual-K13-rev",
            ),
            array(
                "id" => 4635,
                "nama" => "Animasi-K13-rev",
            ),
            array(
                "id" => 4697,
                "nama" => "Seni Musik Klasik-K13-rev",
            ),
            array(
                "id" => 4715,
                "nama" => "Seni Patung-K13-rev",
            ),
            array(
                "id" => 4729,
                "nama" => "Seni Pedalangan Banyumasan-seni etnis",
            ),
            array(
                "id" => 4738,
                "nama" => "Seni Tari Bengkulu-seni etnis",
            ),
            array(
                "id" => 5032,
                "nama" => "Teknologi Pengolahan Hasil Pertanian-K06",
            ),
            array(
                "id" => 5035,
                "nama" => "Agribisnis Pengolahan Hasil Pertanian-K13-rev",
            ),
            array(
                "id" => 5058,
                "nama" => "Mekanisasi Pertanian-K06",
            ),
            array(
                "id" => 5067,
                "nama" => "Agribisnis Rumput Laut-K06",
            ),
            array(
                "id" => 5069,
                "nama" => "Agribisnis Rumput Laut-K13-rev",
            ),
            array(
                "id" => 5094,
                "nama" => "Agribisnis Ternak Ruminansia-K06",
            ),
            array(
                "id" => 5103,
                "nama" => "Agribisnis Ternak Unggas-K06",
            ),
            array(
                "id" => 5106,
                "nama" => "Industri Peternakan-K13-rev",
            ),
            array(
                "id" => 5129,
                "nama" => "Kehutanan-K06",
            ),
            array(
                "id" => 5156,
                "nama" => "Pengawasan Mutu-K06",
            ),
            array(
                "id" => 5183,
                "nama" => "Agribisnis Tanaman Perkebunan-K06",
            ),
            array(
                "id" => 5245,
                "nama" => "Penyuluhan Pertanian-K06",
            ),
            array(
                "id" => 5254,
                "nama" => "Perawatan Kesehatan Ternak-K06",
            ),
            array(
                "id" => 5263,
                "nama" => "Agribisnis Tanaman Pangan dan Holtikultura-K06",
            ),
            array(
                "id" => 5272,
                "nama" => "Agribisnis Pembibitan dan Kultur Jaringan Tanaman-K06",
            ),
            array(
                "id" => 5274,
                "nama" => "Pemuliaan dan Perbenihan Tanaman-K13-rev",
            ),
            array(
                "id" => 5276,
                "nama" => "Lanskap dan Pertamanan-K13-rev",
            ),
            array(
                "id" => 5278,
                "nama" => "Produksi dan Pengelolaan Perkebunan-K13-rev",
            ),
            array(
                "id" => 5281,
                "nama" => "Agribisnis Organik Ekologi-K13-rev",
            ),
            array(
                "id" => 5289,
                "nama" => "Agribisnis Perikanan-K06",
            ),
            array(
                "id" => 5298,
                "nama" => "Agribisnis Aneka Ternak-K06",
            ),
            array(
                "id" => 5310,
                "nama" => "Alat Mesin Pertanian-K13-rev",
            ),
            array(
                "id" => 5319,
                "nama" => "Otomatisasi Pertanian-K13-rev",
            ),
            array(
                "id" => 5329,
                "nama" => "Teknik Inventarisasi dan Pemetaan Hutan-K13-rev",
            ),
            array(
                "id" => 5337,
                "nama" => "Teknik Konservasi Sumber Daya Hutan-K13-rev",
            ),
            array(
                "id" => 5346,
                "nama" => "Teknik Rehabilitasi dan Reklamasi Hutan-K13-rev",
            ),
            array(
                "id" => 5357,
                "nama" => "Teknologi Produksi Hasil Hutan-K13-rev",
            ),
            array(
                "id" => 5381,
                "nama" => "Agribisnis Perikanan Air Tawar-K13-rev",
            ),
            array(
                "id" => 5383,
                "nama" => "Agribisnis Perikanan Air Payau dan Laut-K13-rev",
            ),
            array(
                "id" => 5385,
                "nama" => "Agribisnis Ikan Hias-K13-rev",
            ),
            array(
                "id" => 5426,
                "nama" => "Agribisnis Tanaman Pangan dan Hortikultura-K13-rev",
            ),
            array(
                "id" => 5435,
                "nama" => "Agribisnis Tanaman Perkebunan-K13-rev",
            ),
            array(
                "id" => 5461,
                "nama" => "Agribisnis Ternak Ruminansia-K13-rev",
            ),
            array(
                "id" => 5471,
                "nama" => "Agribisnis Ternak Unggas-K13-rev",
            ),
            array(
                "id" => 5486,
                "nama" => "Keperawatan Hewan-K13-rev",
            ),
            array(
                "id" => 5487,
                "nama" => "Kesehatan dan Reproduksi Hewan-K13-rev",
            ),
            array(
                "id" => 5504,
                "nama" => "Pengawasan Mutu Hasil Pertanian-K13-rev",
            ),
            array(
                "id" => 5505,
                "nama" => "Agroindustri-K13-rev",
            ),
            array(
                "id" => 5516,
                "nama" => "Nautika Kapal Penangkap Ikan-K13-rev",
            ),
            array(
                "id" => 5532,
                "nama" => "Teknika Kapal Penangkap Ikan-K13-rev",
            ),
            array(
                "id" => 5542,
                "nama" => "Industri Perikanan Laut-K13-rev",
            ),
            array(
                "id" => 5549,
                "nama" => "Nautika Kapal Niaga-K13-rev",
            ),
            array(
                "id" => 5559,
                "nama" => "Teknika Kapal Niaga-K13-rev",
            ),
            array(
                "id" => 5567,
                "nama" => "Agribisnis Pengolahan Hasil Perikanan-K13-rev",
            ),
            array(
                "id" => 6018,
                "nama" => "Akuntansi-K06",
            ),
            array(
                "id" => 6021,
                "nama" => "Akuntansi dan Keuangan Lembaga-K13-rev",
            ),
            array(
                "id" => 6027,
                "nama" => "Perbankan-K06",
            ),
            array(
                "id" => 6029,
                "nama" => "Perbankan dan Keuangan Mikro-K13-rev",
            ),
            array(
                "id" => 6037,
                "nama" => "Perbankan Syariah-K13-rev",
            ),
            array(
                "id" => 6039,
                "nama" => "Manajemen Logistik-K13-rev",
            ),
            array(
                "id" => 6045,
                "nama" => "Administrasi Perkantoran-K06",
            ),
            array(
                "id" => 6047,
                "nama" => "Otomatisasi dan Tata Kelola Perkantoran-K13-rev",
            ),
            array(
                "id" => 6054,
                "nama" => "Pemasaran-K06",
            ),
            array(
                "id" => 6056,
                "nama" => "Bisnis Daring dan Pemasaran-K13-rev",
            ),
            array(
                "id" => 6057,
                "nama" => "Retail-K13-rev",
            ),
            array(
                "id" => 7029,
                "nama" => "Teknik Pembangkit Tenaga Listrik-K13-rev",
            ),
            array(
                "id" => 7039,
                "nama" => "Teknik Jaringan Tenaga Listrik-K13-rev",
            ),
            array(
                "id" => 7047,
                "nama" => "Teknik Otomasi Industri-K13-rev",
            ),
            array(
                "id" => 7056,
                "nama" => "Teknik Pendinginan dan Tata Udara-K13-rev",
            ),
            array(
                "id" => 7065,
                "nama" => "Teknik Pemesinan-K13-rev",
            ),
            array(
                "id" => 7074,
                "nama" => "Teknik Pengelasan-K13-rev",
            ),
            array(
                "id" => 7101,
                "nama" => "Teknik Pengecoran Logam-K13-rev",
            ),
            array(
                "id" => 7127,
                "nama" => "Pemesinan Pesawat Udara-K13-rev",
            ),
            array(
                "id" => 7136,
                "nama" => "Konstruksi Badan Pesawat Udara-K13-rev",
            ),
            array(
                "id" => 7145,
                "nama" => "Kostruksi Rangka Pesawat Udara-K13-rev",
            ),
            array(
                "id" => 7154,
                "nama" => "Kelistrikan Pesawat Udara-K13-rev",
            ),
            array(
                "id" => 7171,
                "nama" => "Elektronika Pesawat Udara-K13-rev",
            ),
            array(
                "id" => 7199,
                "nama" => "Produksi Grafika-K13-rev",
            ),
            array(
                "id" => 7207,
                "nama" => "Teknik Instrumentasi Logam-K13-rev",
            ),
            array(
                "id" => 7235,
                "nama" => "Teknik Pemintalan Serat Buatan-K13-rev",
            ),
            array(
                "id" => 7251,
                "nama" => "Teknik Pembuatan Benang-K13-rev",
            ),
            array(
                "id" => 7261,
                "nama" => "Teknik Pembuatan Kain-K13-rev",
            ),
            array(
                "id" => 7271,
                "nama" => "Teknik Penyempurnaan Tekstil-K13-rev",
            ),
            array(
                "id" => 7279,
                "nama" => "Geologi Pertambangan-K13-rev",
            ),
            array(
                "id" => 7287,
                "nama" => "Kimia Analisis-K13-rev",
            ),
            array(
                "id" => 7296,
                "nama" => "Kimia Industri-K13-rev",
            ),
            array(
                "id" => 7331,
                "nama" => "Teknik Alat Berat-K13-rev",
            ),
            array(
                "id" => 7385,
                "nama" => "Teknik Pengelasan Kapal-K13-rev",
            ),
            array(
                "id" => 7421,
                "nama" => "Interior Kapal-K13-rev",
            ),
            array(
                "id" => 7429,
                "nama" => "Teknik Audio Video-K13-rev",
            ),
            array(
                "id" => 7439,
                "nama" => "Teknik Elektronika Industri-K13-rev",
            ),
            array(
                "id" => 7447,
                "nama" => "Teknik Mekatronika-K13-rev",
            ),
            array(
                "id" => 7457,
                "nama" => "Teknik Ototronik-K13-rev",
            ),
        );

        DB::table('jurusans')->insert($jurusans);
    }
}
