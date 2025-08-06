<?php

namespace Database\Seeders;

use App\Livewire\Landing;
use App\Models\Campaign;
use App\Models\gambar_landing;
use App\Models\visi;
use App\Models\misi;
use App\Models\Donasi;
use App\Models\User;
use App\Models\Doa;
use App\Models\Like;
use App\Models\Berita;
use App\Models\Mitra;
use App\Models\Kategori;
use App\Models\Komponen_Ziwaf;
use App\Models\petugas;
use App\Models\pilar_program;
use App\Models\pilihan_infaq;
use App\Models\pilihan_qurban;
use App\Models\pilihan_wakaf;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\VisiFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'password' => '123',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        User::factory()->create([
            'username' => 'donatur',
            'password' => '123',
            'role' => 'donatur',
            'email' => 'donatur@gmail.com',
        ]);

        Mitra::factory()->create([
            'partner_name' => 'AL BAROKAH CILACAP',
            'logo' => 'images/mitra/AL BAROKAH CILACAP.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'AL MA\'WA NU',
            'logo' => 'images/mitra/AL MA\'WA NU.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'ALFAMART',
            'logo' => 'images/mitra/ALFAMART.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'AYAM PENYET SURABAYA',
            'logo' => 'images/mitra/AYAM PENYET SURABAYA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BADAN PANGAN NASIONAL',
            'logo' => 'images/mitra/BADAN PANGAN NASIONAL.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BANK JATENG',
            'logo' => 'images/mitra/BANK JATENG.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BANK MEGA SYARIAH',
            'logo' => 'images/mitra/BANK MEGA SYARIAH.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BANK SYARIAH',
            'logo' => 'images/mitra/BANK SYARIAH.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BAS',
            'logo' => 'images/mitra/BAS.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BAZNAS',
            'logo' => 'images/mitra/BAZNAS.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BEM UNUGHA',
            'logo' => 'images/mitra/BEM UNUGHA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BMT EL-SEJAHTERA',
            'logo' => 'images/mitra/BMT EL-SEJAHTERA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BMT NU CILACAP',
            'logo' => 'images/mitra/BMT NU CILACAP.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BNI',
            'logo' => 'images/mitra/BNI.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BPJS Kesehatan',
            'logo' => 'images/mitra/BPJS Kesehatan.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BPKH',
            'logo' => 'images/mitra/BPKH.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BRI',
            'logo' => 'images/mitra/BRI.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'BSI',
            'logo' => 'images/mitra/BSI.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'CV RISQI GROUP ABADI',
            'logo' => 'images/mitra/CV RISQI GROUP ABADI.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'DETASEMEN KHUSUS 88 ANTI TERROR',
            'logo' => 'images/mitra/DETASEMEN KHUSUS 88 ANTI TERROR.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'DINKES CILACAP',
            'logo' => 'images/mitra/DINKES CILACAP.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'IGRA',
            'logo' => 'images/mitra/IGRA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'IKATAN PROFESI OPTOMETRIS INDONESIA',
            'logo' => 'images/mitra/IKATAN PROFESI OPTOMETRIS INDONESIA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'IKHLAS BERAMAL',
            'logo' => 'images/mitra/IKHLAS BERAMAL.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'JADI BARU TOSERBA',
            'logo' => 'images/mitra/JADI BARU TOSERBA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'KIC',
            'logo' => 'images/mitra/KIC.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'Kita Bisa.com',
            'logo' => 'images/mitra/Kita Bisa.com.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'LEGGO',
            'logo' => 'images/mitra/LEGGO.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'NUCOM',
            'logo' => 'images/mitra/NUCOM.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'NUONLINE',
            'logo' => 'images/mitra/NUONLINE.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'OEMAH AMAL',
            'logo' => 'images/mitra/OEMAH AMAL.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'Paragon',
            'logo' => 'images/mitra/Paragon.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PERCETAKAN KELUD JAYA',
            'logo' => 'images/mitra/PERCETAKAN KELUD JAYA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PERSATUAN PERAWAT NASIONAL INDONESIA',
            'logo' => 'images/mitra/PERSATUAN PERAWAT NASIONAL INDONESIA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PLN PEDULI',
            'logo' => 'images/mitra/PLN PEDULI.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PLN',
            'logo' => 'images/mitra/PLN.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PNC',
            'logo' => 'images/mitra/PNC.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'POLRES JATENG',
            'logo' => 'images/mitra/POLRES JATENG.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'POROZ',
            'logo' => 'images/mitra/POROZ.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'PORTAL',
            'logo' => 'images/mitra/PORTAL.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'S2P',
            'logo' => 'images/mitra/S2P.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'SBm',
            'logo' => 'images/mitra/SBm.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'TOKOPEDIA SALAM',
            'logo' => 'images/mitra/TOKOPEDIA SALAM.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'UNUGHA CILACAP',
            'logo' => 'images/mitra/UNUGHA CILACAP.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'WIJAYA KUSUMA',
            'logo' => 'images/mitra/WIJAYA KUSUMA.png'
        ]);

        Mitra::factory()->create([
            'partner_name' => 'AL MA\'WA NU - Copy',
            'logo' => 'images/mitra/AL MA\'WA NU - Copy.png'
        ]);

        visi::factory()->create([
            'visi' => 'Menjadi Lembaga Filantropi Islam Terkemuka'
        ]);

        misi::factory()->create([
            'misi' => 'Menyediakan program-program untuk peningkatan kualitas sumber daya manusia sehingga 
                        mampu melahirkan intelektual, teknokrat dan wirausahawan yang Unggul dan handal serta 
                        memberikan akses lapangan kerja dan kesempatan berkarir disektor strategis selaras 
                        dengan bidang yang dibutuhkan pemerintah.'
        ]);

        misi::factory()->create([
            'misi' => 'Menjadi pilihan utama mitra strategis dalam berkolaborasi dan bersinergi menjalankan berbagai kegiatan/usaha sosial;'
        ]);

        misi::factory()->create([
            'misi' => 'Meliterasi dan menggalang dana infaq shadaqah dan dana abadi (Trust Fund) berbasis digital untuk kepentingan kegiatan yang berbasis Investasi Sosial;'
        ]);

        gambar_landing::factory()->create([
            'gambar' => 'images/gambar_landing/donasi.png',
            'position' => '1',
            'link' => 'http://127.0.0.1:8000/campaigns'
        ]);

        gambar_landing::factory()->create([
            'gambar' => 'images/gambar_landing/berita.jpg',
            'position' => '2',
            'link' => 'http://127.0.0.1:8000/berita'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Lingkungan Hidup dan Kebencanaan',
            'image' => 'Bencana Alam.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Pendidikan',
            'image' => 'Pendidikan.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Dakwah & Keagamaan',
            'image' => 'Sosial & Keagamaan.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Ekonomi',
            'image' => 'Ekonomi.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Ramadhan',
            'image' => 'Ramadhan.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Kesehatan',
            'image' => 'Kesehatan.svg'
        ]);

        kategori::factory()->create([
            'nama_kategori' => 'Laporan & Publikasi',
            'image' => 'Laporan & Publikasi.svg'
        ]);

        Berita::factory()->create([
            'title_berita' => 'Hari Solidaritas Internasional bagi Rakyat Palestina: Bersatu dalam Kemanusiaan',
            'slug' => 'hari-solidaritas-internasional-bagi-rakyat-palestina-bersatu-dalam-kemanusiaan',
            'description' => 'Hari Solidaritas Internasional bagi Rakyat Palestina adalah pengingat penting bahwa kemerdekaan belum dirasakan rakyat Palestina hingga sekarang. Di tengah agresi yang terus meningkat, penderitaan mereka menjadi sorotan dunia, termasuk serangan masif sejak Oktober 2023.

Menurut data dari Palestinian Central Bureau of Statistics (23 November 2024):

44.970 rakyat Palestina menjadi korban jiwa dari agresi Israel sejak 7 Oktober 2023
110.723 warga terluka
2.000.000 orang mengungsi
16.900 warga Palestina ditahan, termasuk anak-anak dan remaja
281.713 unit bangunan hancur, mencakup rumah, sekolah, rumah sakit, dan infrastruktur lainnya.
Kerusakan ini berdampak langsung pada hak-hak dasar rakyat Palestina. Banyak sekolah di Gaza tidak dapat digunakan, sehingga anak-anak kehilangan akses terhadap pendidikan. Layanan kesehatan pun lumpuh akibat hancurnya rumah sakit dan terbatasnya pasokan medis.

Dilansir dari Al Jazeera per tanggal 26 November 2024, pasukan Israel menewaskan 11 warga Palestina dalam tiga serangan di daerah utara Jalur Gaza. Seiring dengan curah hujan yang tinggi dan naiknya air laut yang menambah sulit kondisi para pengungsi yang berlindung di tenda-tenda darurat.

Kondisi ini diperparah dengan habisanya pasokan medis di Rumah Sakit Al-Ahli (al-Ahli Hospital). Sementara paramedis menghadapi ancaman serangan ketika berusaha mengevakuasi korban. Banyak pasien tidak dapat bertahan karena kurangnya peralatan pertolongan pertama dasar, seperti oksigen dan obat-obatan.

Serangan di Jabalia dan Zeitoun pun terjadi. Pesawat tempur Israel membom rumah-rumah warga, termasuk yang berada di dekat sekolah dasar. Banyak korban jiwa tidak dapat dievakuasi karena infrastruktur yang rusak dan bahaya lanjutan.

Kenyataan ini, yang makin hari makin memprihatinkan tak selayaknya luput dari perhatian kita. Hari Solidaritas Internasional ini menjadi momentum penting untuk kembali menegaskan dukungan kepada rakyat Palestina. Sebagai makhluk sosial, kita memiliki tanggung jawab moral untuk terus peduli, baik melalui doa, edukasi, maupun aksi nyata.

Sahabat Peduli dapat memberi dukungan terbaik dan aksi nyata untuk saudara di Palestina dengan memberikan donasi melalui laman NU Peduli Palestina atau transfer ke rekening berikut:

BCA 0680 1926 77 An. Yay. Lembaga Amil Zakat Infaq dan Shadaqah NU

BSI 7015 654 583 An. PP LAZIS NU NON ZAKAT

Kemanusiaan tidak mengenal batas. Mari bersama-sama kita menjadi bagian dari perjuangan Rakyat Palestina.

Penulis: Zahramaay
Editor: Wahyu Noerhadi',
            'picture' => 'images/berita/8.jpeg',
            'tanggal' => '2024-11-29',
            'id_kategori' => '1'
        ]);
        Berita::factory()->create([
            'title_berita' => 'NU Care-LAZISNU Cilacap dan PLN Indonesia Power Salurkan Bantuan Listrik Gratis untuk Warga Desa Adiraja',
            'slug' => 'nu-care-lazisnu-cilacap-dan-pln-indonesia-power-salurkan-bantuan-listrik-gratis-untuk-warga-desa-adiraja',
            'description' => 'NU Care-LAZISNU Cilacap bersama PT PLN Indonesia Power UBP Jawa Tengah 2 Adipala kembali melaksanakan program sosial berupa pemasangan listrik gratis untuk masyarakat kurang mampu di Desa Adiraja, Kecamatan Adipala, Kabupaten Cilacap, Jawa Tengah.

Program ini merupakan bagian dari tanggung jawab sosial perusahaan (CSR) yang bertujuan memberikan akses listrik kepada warga yang belum terjangkau layanan energi.

Dalam pelaksanaannya, dua keluarga di Desa Adiraja menjadi penerima manfaat bantuan tersebut, yakni Joni Riyanto yang beralamat di Jl Gereja RT 002 RW 001 dan Karyo Pawiro di Gang Peci RT 006 RW 003.

Kepala Cabang NU Care-LAZISNU Cilacap, Ahmad Fauzi mengharapkan program ini mampu meningkatkan kualitas hidup penerima manfaat melalui akses energi yang mendukung kebutuhan dasar seperti penerangan dan aktivitas ekonomi rumah tangga.

Fauzi juga menjelaskan peran penting yang diemban oleh NU Care-LAZISNU Cilacap dalam program ini. 

“LAZISNU Cilacap sebagai pengelola dana CSR untuk program ini, termasuk hingga teknis pendaftaran ke PLN dan pemasangan, menjadi tanggung jawab kami. Untuk penerima manfaat, LAZISNU Cilacap berkoordinasi dengan Pemerintah Desa Adiraja dan memastikan bahwa penerima masuk dalam Data Terpadu Kesejahteraan Sosial (DTKS) serta memiliki Surat Keterangan Tidak Mampu (SKTM)," jelas Fauzi dalam keterangannya yang diterima NU Care, Selasa (26/11/2024).

Ia menambahkan bahwa komunikasi intensif dengan pihak PLN Indonesia Power UBP Jawa Tengah 2 Adipala dilakukan sejak awal program.

"Sebelumnya, Indonesia Power berkoordinasi dengan LAZISNU terkait teknis pemilihan penerima manfaat, yang kemudian diteruskan dengan koordinasi bersama Pemerintah Desa Adiraja," ungkapnya.

Menurut Fauzi, program pemasangan listrik gratis ini memiliki dampak positif pada peningkatan kesejahteraan masyarakat.

“Dengan akses listrik, penerima manfaat dapat menikmati penerangan yang memadai, mendukung kegiatan belajar anak-anak, serta membuka peluang usaha kecil yang dapat membantu menambah penghasilan keluarga,” terangnya.

Pihaknya berharap program ini tidak hanya memberikan manfaat langsung berupa akses energi tetapi juga berkontribusi pada pengurangan beban ekonomi masyarakat kurang mampu, pemerataan akses energi antara wilayah perkotaan dan pedesaan, serta peningkatan produktivitas masyarakat.

“Keberhasilan program ini diharapkan dapat menciptakan dampak positif yang berkelanjutan, baik untuk masyarakat saat ini maupun generasi mendatang,” ucap Fauzi.

Selain itu, sambungnya, NU Care-LAZISNU Cilacap juga mengadakan pelatihan pemberdayaan masyarakat bekerja sama dengan PT PLN Indonesia Power.

“Pelatihan ini mencakup budidaya dan perawatan cabai untuk kelompok tani di Desa Wlahar, Kecamatan Adipala serta pembuatan dan pemasaran keripik tempe untuk Kelompok Wanita Tani Srikandi Jaya di desa yang sama,” papar Fauzi.

“Dengan terus mendukung kegiatan seperti ini, NU Care-LAZISNU Cilacap bersama mitra strategisnya berharap dapat memperluas jangkauan bantuan dan mendorong kemajuan sosial serta ekonomi masyarakat di berbagai daerah,” pungkasnya.

Kontributor : NU Care-LAZISNU Cilacap
Editor : Putri Azmi M/Wahyu Noerhadi',
            'picture' => 'images/berita/9.jpeg',
            'tanggal' => '2024-11-26',
            'id_kategori' => '1'
        ]);
        Berita::factory()->create([
            'title_berita' => 'Hasil Survey World Giving Index, 7 Tahun Berturut-turut Indonesia Jadi Negara Paling Dermawan di Dunia',
            'slug' => 'hasil-survey-world-giving-index-7-tahun-berturut-turut-indonesia-jadi-negara-paling-dermawan-di-dunia',
            'description' => 'NU Care-LAZISNU Cilacap Jawa Tengah menyalurkan paket berbuka puasa untuk santri yatim dan dhuafa di Pondok Pesantren Tarbiyatul Aulad Cilacap Selatan, Jumat (15/03/2024). 

                                Direktur NU Care-LAZISNU Cilacap mengatakan bulan Ramadhan selalu menjadi momentum untuk berlomba-lomba dalam kebaikan.

                                “Salah satu bentuk kebaikan tersebut adalah dengan berbagi kepada santri,anak yatim dan duafa,” katanya.

                                Penyaluran paket berbuka puasa tersebut berupa buka puasa super Duk Duk Berbagi dari KFC Indonesia menyasar 200 penerima.

                                “Kami mengucapakan terima kasih kepada KFC Indonesia yang telah mempercayai LAZISNU Cilacap untuk menjadi partner dalam kegiatan ini,” imbuh Fauzi.

                                Sesuai dengan tema Ramadhan tahun ini yakni Mahabbah Ramadhan, lanjut Fauzi, NU Care-LAZISNU Cilacap juga mengadakan berbagai program ramadhan lainnya.

                                “Di antaranya Paket buka puasa untuk pejuang nafkah dan iftar bersama santri.” ujarnya.

                                Pengasuh Pondok Pesantren Tarbiyatul Aulad  KH Amrin Aulawi mengucapkan terima kasih atas bantuan dan program yang diberikan.

                                “Semoga LAZISNU Cilacap semakin dipercaya oleh masyarakat semakin besar dan semakin bertambah manfaat untuk masyarakat,” harapnya.

                                Kegiatan tersebut diawali dengan serah terima secara simbolis oleh Ketua LAZISNU Cilacap H Wasbah Samudera Fawaid dan diterima oleh KH Amrin Aulawi, dilanjutkan dengan Tausiyah singkat dan buka bersama.

                                Ketua LAZISNU Cilacap, H Wasbah Samudera Fawaid mengatakan NU Care-LAZISNU Cilacap diberikan amanah untuk menyalurkan paket buka puasa Super Dukduk Berbagi sebanyak 200 paket setiap Jumat.

                                “Paket tersebut untuk diberikan kepada santri, yatim, dhuafa, pejuang nafkah,” kata Wasbah.

                                Pewarta: Kendi Setiawan

                                Sumber : nucare.id',
            'picture' => 'images/berita/10.jpeg',
            'tanggal' => '2024-11-29',
            'id_kategori' => '3'
        ]);

        Berita::factory()->create([
            'title_berita' => 'Penguatan Program LAZ Harus Berbasis Logical Framework Analysis untuk Efektivitas dan Keberlanjutan',
            'slug' => 'penguatan-program-laz-harus-berbasis-logical-framework-analysis-untuk-efektivitas-dan-keberlanjutan',
            'description' => 'Program Smart Amil Virtual NU Care-LAZISNU hadir sebagai wadah pembelajaran yang awalnya dirancang untuk internal LAZISNU, dari tingkat pusat hingga ranting. Namun, inisiatif ini kini diperluas untuk masyarakat umum, termasuk para pengikut (followers) NU Care-LAZISNU di berbagai platform.

Dalam sesi yang menghadirkan Hamid Abidin, anggota Dewan Pakar Filantropi Indonesia, Jumat (22/11/2024) disampaikan materi tentang Logical Framework Analysis (LFA).

Hamid memaparkan bahwa LFA merupakan alat penting dalam menyusun program yang relevan, terukur, dan berkelanjutan.

Relevansi Program dengan Kebutuhan Masyarakat
Hamid menyoroti tantangan yang dihadapi lembaga filantropi, termasuk NU Care-LAZISNU, dalam pengembangan program.

"Sering kali, program tidak relevan dengan kebutuhan masyarakat atau prioritas program pemerintah. Misalnya, saat ini isu ketahanan pangan dan dampak PHK menjadi perhatian utama. Program yang kita kembangkan harus mengarah pada solusi terhadap persoalan tersebut," jelasnya.

Ketua Badan Pengurus Public Interest Research and Advocacy Center (PIRAC) itu menuturkan analisis kebutuhan masyarakat dan konteks permasalahan adalah langkah awal yang krusial.

Selain itu, ia menekankan pentingnya memiliki indikator keberhasilan yang jelas. "Kita harus bisa menjawab, apa tujuan program ini? Bagaimana cara mengukurnya? Apa dampak yang ingin dicapai?" tambahnya.

Kerangka Logis untuk Program yang Terukur dan Berkelanjutan
Hamid memperkenalkan LFA sebagai metode yang dapat membantu lembaga zakat menyusun program dengan kerangka yang logis, mulai dari analisis masalah, desain strategi, hingga pelaksanaan, monitoring, dan evaluasi.

"LFA memungkinkan kita untuk mengidentifikasi masalah, menentukan strategi, mengenali penerima manfaat, melibatkan stakeholder, hingga merinci sumber daya yang diperlukan,” ungkapnya.

Ia juga menekankan pentingnya mengaitkan kegiatan dengan tujuan dan sasaran program, serta memastikan kontribusi setiap program terhadap pencapaian tujuan strategis organisasi.

Kolaborasi dan Dukungan Stakeholder
Hamid menggarisbawahi perlunya identifikasi stakeholder yang jelas, termasuk perusahaan, pemerintah, lembaga donor, dan masyarakat.

"Stakeholder harus memahami bahwa program yang kita tawarkan memberikan manfaat bagi mereka. Misalnya, perusahaan bisa mendukung program kesehatan masyarakat karena ini berdampak pada produktivitas dan kesejahteraan pekerja mereka,” ujarnya.

Menjadikan LFA Alat Strategis
Dengan menggunakan LFA, kata Hamid, NU Care-LAZISNU diharapkan dapat mengembangkan program yang:

Relevan dengan kebutuhan masyarakat dan prioritas pemerintah
Terukur, dengan tujuan dan indikator keberhasilan yang jelas
Berorientasi hasil, untuk memberikan dampak nyata
Berkelanjutan, dengan dukungan stakeholder
Hamid menegaskan bahwa penerapan LFA adalah langkah strategis untuk memastikan program NU Care-LAZISNU memberikan dampak maksimal dan tetap relevan.

"Mari jadikan alat ini sebagai panduan untuk mengatur pemikiran dan memastikan program kita berkontribusi nyata, seperti pada isu stunting atau ketahanan pangan," tegasnya.

Editor: Kendi Setiawan/Wahyu Noerhadi',
            'picture' => 'images/berita/11.jpeg',
            'tanggal' => '2024-11-28',
            'id_kategori' => '3'
        ]);
        Berita::factory()->create([
            'title_berita' => 'Program Ramadhan 2024, Nu Care-Lazisnu Cilacap Berhasil Menyalurkan Kepada 54.000 Penerima Manfaat',
            'slug' => 'program-ramadhan-2024-nu-care-lazisnu-cilacap-berhasil-menyalurkan-kepada-54-000-penerima-manfaat',
            'description' => 'NU Care-LAZISNU Cilacap telah berhasil menyalurkan dana zakat, infak, dan sedekah (ZIS) pada Ramadan 1445 H/2024 M kepada lebih dari 54.000 penerima manfaat. Dana ZIS tersebut disalurkan melalui 5 pilar program dan 12 program unggulan yang dilaksanakan selama bulan Ramadan 1445 H.

                                Program Ramadan yang telah dilaksanakan antara lain, Peningkatan Gizi dan Ketahanan Pangan, Beasiswa santri nusantara, Syiar quran, Beras santri nusantara, Belanja bersama adik juara anak yatim, Bantuan usaha untuk keluarga berdaya, Layanan Masjid Sehat, Warteg Gratis untuk Pejuang Nafkah, Sepeda Sekolah untuk yatim dhuafa, Bantuan usaha untuk difabel berdaya, Training guru Al-Quran, Gerai Ta’jil Gratis serta Bantuan Kemanusiaan untuk Palestina.

                                Selain program-program yang telah disebutkan, masih banyak puluhan program yang telah berjalan beriringan selama Ramadan 1445 H ini. Pelaksanaan-program Ramadan ini berlandaskan lima pilar NU Care-LAZISNU Cilacap, yaitu Pendidikan, Kesehatan, Kemanusiaan, Ekonomi dan Dakwah-Advokasi. Apabila dirinci terdapat sekitar 54 ribu lebih penerima manfaat tersebut terdiri dari 296 jiwa penerima manfaat bidang pendidikan, 518 penerima manfaat bidang kesehatan, 3.955 penerima manfaat bidang kemanusiaan, 83 penerima manfaat bidang Ekonomi dan 13.109 penerima manfaat bidang Dakwah-Advokasi dan 35.000 penerima manfaat bidang lainnya.
                                Data Program Ramadhan ini terangkum sejak awal bulan ramadhan 1445 H, tepatmya tanggal 12 maret 2024 hingga akhir ramadhan yakni tanggal 9 April 2024. Untuk persebaran wilayah pentasarufan NU Care-Lazisnu Cilacap telah berhasil menjangkau 24 kecamatan dan 269 desa di Kabupaten Cilacap.

                                Direktur NU Care-LAZISNU Cilacap, Ahmad Fauzi, S.Pdi mengatakan bahwasannya program Ramadhan ini merupakan program rutin NU Care-LAZISNU Cilacap setiap tahunnya, tahun ini kita mengusung tema Mahabbah Ramadhan dengan tujuan menyebarkan cinta dan kasih sayang kepada saudara kita yang membutuhkan. Alhamdulillah, capaian Ramadhan kali ini mengalami peningkatan dari tahun kemarin. Semua pencapaian ini tidak lepas dari peran serta munfiq, donatur, stakeholder serta mitra-mitra yang sudah turut serta dalam #kolaborasikankebaikan bersama NU Care-LAZSINU Cilacap.

                                “Terimakasih kepada munfiq, donatur, stakeholder serta mitra yang telah bersama-sama #kolaborasikankebaikan menyukseskan program ramadhan tahun ini, Alhamdulillah kita berhasil mentasarufkan program-program ramadhan di 24 kecamatan dan 269 desa mulai dari cilacap ujung barat hingga cilacap ujung timur. Harapan kita untuk tahun berikutnya kita mampu menjangkau lebih banyak penerima manfaat, karena senyum kebahagiaan penerima manfaat menjadi kebahagiaan kita semua” ungkapnya.',
            'picture' => 'images/berita/1.jpeg',
            'tanggal' => '2024-05-20',
            'id_kategori' => '3'
        ]);

        Berita::factory()->create([
            'title_berita' => 'Pemkab Beri Piagam Ambulance Teraktif kepada NU Care-LAZISNU Cilacap',
            'slug' => 'pemkab-beri-piagam-ambulance-teraktif-kepada-nu-care-lazisnu-cilacap',
            'description' => 'Dinas Kesehatan Pengendalian Penduduk dan Keluarga Berencana (Dinkes PPKB) Kabupaten Cilacap memberikan Piagam Apresiasi kepada NU Care LAZISNU Cilacap sebagai Lembaga Amil Zakat dengan Program layanan ambulance rujukan kesehatan teraktif.

                                dr Pramesti Griana Dewi MKes MSi selaku Kepala Dinas melalui Kepala Bidang Farmasi, alat kesehatan dan makanan minuman, Hudaefah, SKM, MKes menyampaikan apresiasi atas peran serta mobil layanan umat NU Care LAZISNU Cilacap sebagai rujukan kesehatan teraktif.

                                Disampaikan bahwa NU Care LAZISNU Cilacap telah melayani sebanyak 3.842 penerima manfaat. Di antaranya meliputi mengantar jemput pasien yang berobat ke rumah sakit. Juga layanan mengantar jenazah.

                                Kepala Dinas berharap, ke depan mobil layanan umat LAZISNU Cilacap dapat lebih optimal lagi menjangkau seluruh masyarakat di Kabupten Cilacap yang membutuhkan.

                                Penghargaan diterima Ketua Tanfidziyah PCNU Cilacap Dr H Imam Tobroni pada kegiatan ‘Rapat Koordinasi Layanan Kesehatan’ di Gedung Pusdiklat PCNU Cilacap. Jalan Raya Kalisabuk KM 15 Cilacap Sabtu, (18/05/2024) kemarin.

                                Dr H Imam Tobroni melalui Direktur NU Care LAZISNU Cilacap Ahmad Fauzi melaporkan sepanjang 2023, mobil ambulance kemanusiaan NU Care LAZISNU Cilacap Jawa Tengah telah aktif melayani sebanyak 3.842 penerima manfaat.

                                Layanan tersebut berupa berbagai keperluan, mulai mengantar jemput pasien yang berobat ke rumah sakit, hingga mengantar jenazah.

                                “Total ada 2.811 layanan pasien dan 1.031 jenazah. Untuk jumlah seluruhnya 3.842 penerima manfaat,” kata Direktur
                                NU Care LAZISNU Cilacap Ahmad Fauzi.
                                Rincian Layanan Ambulance.

                                Fauzi merinci, layanan mobil ambulance kemanusiaan NU Care LAZISNU Cilacap tahun 2023 adalah sebagai berikut:

                                Januari, sebanyak 207 pasien, 113 jenazah dengan total 320 penerima manfaat,
                                2. Februari, sebanyak 147 pasien, 75 jenazah, dengan total 222 penerima manfaat,
                                3. Maret, sebanyak 178 pasien, 92 jenazah dengan total 270 penerima manfaat,
                                4. April, 185 pasien, 75 pasien dengan total 260 penerima manfaat
                                5. Mei, sebanyak 230 pasien, 109 jenazah dengan total 339 penerima manfaat,
                                6. Juni, sebanyak 228 pasien, 67 jenazah dengan total 295 penerima manfaat.
                                7. Juli, sebanyak 246 pasien, 78 jenazah dengan total 324 penerima manfaat,
                                8. Agustus, sebanyak 255 pasien, 78 jenazah dengan total 333 penerima manfaat,
                                9. September, sebanyak 259 pasien, 94 jenazah dengan total 353 penerima manfaat,
                                10. Oktober, sebanyak 290 pasien, 85 jeazah dengan total 375 penerima manfaat,
                                11. November, sebanyak 308 pasien, 82 Jenazah dengan total 390 penerima manfaat, dan
                                12. Desember sebanyak 278 pasien, 83 jenazah dengan total 361 penerima manfaat.
                                Total layanan ambulance
                                NU Care LAZISNU Cilacap LAZISNU Cilacap tersebut mencerminkan layanan teraktif. Fauzi mengatakan ini merupakan bentuk pengabdian NU Care LAZISNU Cilacap atas nama kemanusiaan.

                                “Bagi masyarakat luas terutama di Kabupaten Cilacap yang hendak menggunakan jasa ambulance kemanusiaan ini dipersilakan dengan menghubungi Nomo 081228221010 Call Center LAZISNU Cilacap.” tambahnya.

                                “Mohon doanya agar layanan mobil ambulance kemanusiaan NU Care LAZISNU Cilacap terus berkembang dan menjangkau sudut-sudut tempat tinggal masyarakat yang terisolir sekalipun,” tegasnya. (IHA)

                                Penulis : Imam Hamidi Antassalam

                                Sumber : pcnucilacap.com',
            'picture' => 'images/berita/2.jpeg',
            'tanggal' => '2024-05-20',
            'id_kategori' => '3'
        ]);

        Berita::factory()->create([
            'title_berita' => 'Khidmah LAZISNU, Bupati Cilacap Ganjar dengan Dua Penghargaan',
            'slug' => 'khidmah-lazisnu-bupati-cilacap-ganjar-dengan-dua-penghargaan',
            'description' => 'Lembaga Amil Zakat dan Infaq dan Sedekah Nadlatul Ulama (LAZISNU) Cilacap mendapatkan penghargaan dari Bupati Cilacap Awaluddin Muuri saat pembukaan Konferensi Cabang (Konfercab) NU Cilacap pada Sabtu (20/4/2024) di Gedung Diklat NU setempat.


                                Direktur LAZISNU Cilacap Ahmad Fauzi mengatakan, penghargaan tersebut berupa dua kategori di antaranya terkait penanggulangan bencana dan responsif dalam peningkatan kesejahteraan masyarakat.

                                “Pertama, penghargaan penanggulangan bencana di Cilacap dan kedua sebagai Lembaga Amil Zakat dan Infaq responsif terhadap peningkatan kesejahteraan di bidang ekonomi dan sosial,” ujarnya kepada NU Online Jateng Jumat (26/4/2024).

                                Disampaikan, program-program pembinaan dan pendampingan maupun penggalangan pendanaan yang selama LAZISNU lakukan telah mendapat apresiasi dari pemerintah khususnya dalam penanggulangan bencana dan peningkatan kesejahteraan.

                                “Atas peran dan kontribusi, LAZISNU Cilacap juga mendapat penghargaan NU Cilacap Awad PCNU Cilacap melalui dua pemimpinnya yakni H Wasbah Samudra Fawaid, sebagai Ketua LAZISNU dan Ahmad Fauzi sebagai Sekretaris NU LAZISNU Cilacap,” terangnya.


                                Menurutnya, 2 penghargaan dari PCNU diberikan sebagai tokoh muda NU teladan yang memiliki kontribusi, pemikiran, dan karya yang berpengaruh luas dan berkontribusi kuat untuk menggerakkan filantropi NU Cilacap.


                                “Juga sekaligus menjadi inisiator digitalisasi pengelolaan LAZISNU. Penghargaan diberikan oleh Rais dan Ketua PCNU Cilacap,” ungkapnya.


                                Rais PCNU Cilacap KH Syu’ada Adzkiya mengaku salut atas kinerja LAZISNU. Mereka tiada lelah untuk berkhidmah menghimpun dan menyalurkan, memantau dan memonitor aktivitas LAZISNU di lapangan.


                                “Alhamdulillah, atas kiprah LAZISNU Cilacap, PWNU Jateng memberikan penghargaan pada kegiatan Muskerwil NU Jateng di Kabupaten Kendal beberapa waktu yang lalu,” terangnya. 


                                Diketahui, kiprah LAZISNU Cilacap sejak beberapa tahun terakhir ini khususnya dalam pengumpulan dana melalui Kotak Infaq (Koin) NU bisa terkumpul hingga miliaran rupiah setiap bulannya. Gerakan yang secara masif dilakukan mengundang berbagai cabang maupun MWC untuk belajar manajemen penghimpunan dan pengelolaannya.

                                Pengirim: Ahmad Solkan 
                                Sumber : jateng.nu.or.id',
            'picture' => 'images/berita/3.jpeg',
            'tanggal' => '2024-05-20',
            'id_kategori' => '7'
        ]);

        Berita::factory()->create([
            'title_berita' => 'NU Care-LAZISNU Salurkan Bantuan 3 Truk Kontainer Paket Pangan, Tepung dan Terpal untuk Warga Gaza',
            'slug' => 'nu-care-lazisnu-salurkan-bantuan-3-truk-kontainer-paket-pangan-tepung-dan-terpal-untuk-warga',
            'description' => 'Jakarta, NU Care
                                Penyaluran bantuan kemanusiaan bagi rakyat Palestina terus dilakukan oleh NU Care-LAZISNU melalui sejumlah mitra, baik di dalam maupun luar negeri. Teranyar, NU Care-LAZISNU melalui Gazze Destek Dernegi (GDD) atau Asosiasi Dukungan Gaza yang bermarkas di Istanbul, Turki mengirimkan 3 (tiga) truk kontainer bantuan kemanusiaan berupa paket pangan, tepung dan terpal yang didistribusikan bagi warga Gaza, Palestina.

                                Direktur Eksekutif NU Care-LAZISNU PBNU, Qohari Cholil mengungkapkan bahwa hingga saat ini warga Gaza masih membutuhkan bantuan, maka itu pihaknya berkomitmen akan terus menyalurkan bantuan melalui berbagai mitra NU Care-LAZISNU, salah satunya GDD.,

                                “Melalui GDD ini, proses pengiriman bantuan ke Gaza via Mesir sudah dilakukan, dengan bentuk bantuan berupa satu truk kontainer berisi paket pangan, satu truk tepung atau gandum, dan satu truk lagi berisi bantuan terpal,” kata Qohari di kantor NU Care-LAZISNU PBNU, Jakarta Pusat, Rabu (24/04/2024).

                                Qohari berharap bantuan tersebut dapat segera diterima oleh warga Gaza.

                                “Mudah-mudahan prosesnya berjalan lancar dan bantuan segera bisa diterima oleh warga Palestina di Gaza yang memang sangat membutuhkannya,” ucapnya.

                                Sementara itu, Manajer Kemitraan Wilayah Asia Tenggara GDD, Faqihussyari menjelaskan bantuan kemanusiaan dari NU Care-LAZISNU diberangkatkan dari Gudang Paket Pangan Ismailiyah, Mesir pada 30 Maret dan tiba di Rafah pada 13 April 2024.

                                “Alhamdulillah sebanyak 1.452 paket pangan bantuan dari NU Care-LAZISNU sudah masuk Gaza. Satu truk tepung atau gandum untuk bahan roti juga sudah masuk Gaza dan sudah didistribusikan oleh tim GDD di Gaza, tinggal truk terpal kami masih menunggu kabar,” papar Faqih dalam laporannya.

                                Adapun bantuan paket pangan berisikan kurma, beras Mesir, manisan, selai kacang, daging sapi kaleng, keju, saus tomat, spaghetti, pembalut wanita, keju kuning, tuna kaleng, teh, gula, hums, garam, dan tepung.

                                Pihaknya pun menyampaikan ucapan terima kasih kepada Nahdlatul Ulama dan rakyat Indonesia atas dukungan dan bantuan kemanusiaan bagi Palestina.

                                “Tim GDD berterima kasih dan memberikan apresiasi tertinggi untuk NU Care- LAZISNU dan rakyat Indonesia yang selalu men-support dan memberikan bantuan terbaik untuk rakyat Palestina, baik langsung di dalam Gaza maupun melalui truk-truk kemanusiaan dari Kairo Mesir. Jazakumullahu khairan wa barakallahu fikum,” tutur Faqih.

                                Ia berharap kemitraan NU Care-LAZISNU dengan GDD dapat berlanjut dan terus memberikan bantuan bagi rakyat Palestina yang mengungsi di Jalur Gaza.

                                “Harapan kami semoga kerja sama ini terus berlanjut antara LAZISNU dan GDD, agar bisa memberikan manfaat yang lebih luas kepada jutaan pengungsi yang ada di Jalur Gaza, yang masih membutuhkan bantuan dan doa dari kita semua,” pungkasnya.

                                Pewarta: Wahyu Noerhadi

                                Sumber : nucare.id',
            'picture' => 'images/berita/4.jpeg',
            'tanggal' => '2024-04-25',
            'id_kategori' => '3'
        ]);

        Berita::factory()->create([
            'title_berita' => 'NU Care-LAZISNU Cilacap Bentuk JPZIS Tingkat Masjid dan Mushala',
            'slug' => 'nu-care-lazisnu-cilacap-bentuk-jpzis-tingkat-masjid-dan-mushala',
            'description' => 'Cilacap, NU Care
                                NU Care-LAZISNU Cilacap Jawa Tengah mengadakan sosialisasi mengenai amil zakat dan manajemen pengelolaan zakat fitrah di masjid dan mushala pada Jumat (5/04/2024). Kegiatan bertempat di Gedung Majelis Wakil Cabang Nahdlatul Ulama (MWCNU) Karangpucung dan Kawunganten, Cilacap Jawa Tengah.

                                Peserta kegiatan tersebut berasal dari utusan masjid dan mushala di wilayah Kecamatan Karangpucung, Majenang dan Kawunganten.

                                Direktur NU Care-LAZISNU Cilacap, Ahmad Fauzi menjelaskan pada sesi pertama sosialisai diisi tentang materi fiqih zakat. Pemateri, Kiai Ahmad Fatoni, Dewan Syariah NU Care-LAZISNU Cilacap menjelaskan terkait buku panduan zakat yang diterbitkan NU Care-LAZISNU Cilacap khususnya tentang zakat fitrah.

                                “Takmir masjid dan mushala selaku pengelola dan petugas penyalur zakat fitrah nantinya, akan ditetapkan sebagai Jaringan Pengelola Zakat, Infak, dan Sedekah (JPZIS) di bawah naungan NU Care-LAZISNU Cilacap,” ujarnya.

                                Disampaikan, ke depan ketika para takmir masjid dan mushala mendapat Surat Keputusan (SK), maka mereka dinyatakan sah dan resmi sebagai amil zakat fitrah.

                                “Artinya, sudah memenuhi persayaratan yang ditetapkan undang-undang tentang pengelolaan zakat. Mengingat tugas dan tanggung jawab yang besar itulah bimtek pada hari ini diselenggerakan,” tegas Fauzi.

                                Para peserta sosialisasi tampak antusias dan aktif dalam mengikuti kegiatan ini, dibuktikan dengan banyaknya pertanyaan dari mereka. Sosialisasi ini ditutup menjelang Maghrib dengan pelaksanaan simulasi interaktif pentasyarufan zakat fitrah.

                                “Sehingga ini memudahkan pemahaman peserta,” tutur Fauzi 

                                Saat ini sudah lebih dari 800 buah masjid dan mushala yang sidah ber-SK oleh NU Care-LAZISNU Cilacap.

                                Kontributor: Ahmad Solkan
                                Editor: Kendi Setiawan

                                Sumber : nucare.id',
            'picture' => 'images/berita/5.jpeg',
            'tanggal' => '2024-04-19',
            'id_kategori' => '3'
        ]);

        Berita::factory()->create([
            'title_berita' => 'Mahabbah Ramadhan, NU Care-LAZISNU Cilacap Gelar Pelatihan Baca Al-Qur’an Bahasa Isyarat dan Braille',
            'slug' => 'mahabbah-ramadhan-nu-care-lazisnu-cilacap-gelar-pelatihan-baca-al-qur-an-bahasa-isyarat-dan-braille',
            'description' => 'NU Care-LAZISNU Cilacap meluncurkan program Training of Trainer (TOT) bagi pengajar Al-Qur’an bahasa isyarat dan Braille beserta para penyandang disabilitas pada rangkaian program Mahabbah Ramadhan 1445 H atau 2024 M.

                                “Kami meluncurkan program TOT bagi para pengajar yang akan mengajari dan belajar bahasa isyarat membaca Al-Qur’an dan Al-Qur’an Braille dan para difabel,” ujar Ahmad Fauzi, Direktur NU Care LAZISNU Cilacap, Selasa (03/04/2024).

                                Fauzi mengatakan, kelompok difabel perlu mendapatkan kesempatan yang sama dalam menjalani kehidupannya sehari-hari, termasuk belajar membaca Al-Qur’an lewat bahasa isyarat dan Braille.

                                “Tujuannya agar difabel tuli dan tunanetra ini, bisa membaca Al-Qur’an dengan bahasa isyarat ataupun Braille,” ujar Fauzi. 

                                Adapun kegiatan tersebut diluncukan pada Selasa (19/03/2024) dan berlangsung hingga Rabu (20/03/2024). Terdapat 60 peserta berkebutuhan khusus dari tunanetra dan tunarungu sebagai peserta. Selain peserta disabilitas, pelatihan juga diikuti guru agama dan utusan dari setiap Kecamatan di Kabupaten Cilacap.

                                Fauzi mengatakan ke depan, selain melatih pengajar Al-Qu’ran bahasa isyarat dan Braille, NU Care-LAZISNU Cilacap  juga akan mengirimkan pengajar untuk belajar lebih dalam tentang Al-Qur’an bahasa isyarat dan Braille di Lajnah Pentashihan Mushaf Al Quran (LPMQ) Balitbang Diklat Kemenag.

                                “Mushaf isyarat dan Braille ini bertujuan memberikan afirmasi layanan keagamaan kepada teman-teman tuli dan tuna netra,” katanya.

                                Pelatihan ini juga mencakup pengetahuan dasar tentang disabilitas dan bagaimana membantu individu dengan disabilitas dalam pembelajaran Al-Qur’an dengan narasumber ahli dalam bidangnya. 

                                “Peserta pelatihan mempelajari strategi komunikasi yang efektif, metode pengajaran yang inklusif, serta memahami kebutuhan dan tantangan yang dihadapi oleh individu dengan berbagai jenis disabilitas,” ujar Fauzi.

                                Lebih lanjut, Fauzi mengungkapkan mushaf Al-Qur’an Bahasa Isyarat ini diproduksi oleh Lajnah Pentashihan Mushaf Al-Qur’an (LPMQ) Kemenag RI. Mushaf ini merupakan yang pertama kali di Indonesia, bahkan dunia. Sebelumnya, LPMQ Kemenag RI juga telah mengeluarkan mushaf Al-Qur’an Braille yang diperuntukkan bagi kelompok difabel tuna netra.

                                “Program ini merupakan hasil kerja sama antara NU Care-LAZISNU Cilacap bersama BAZNAS Kabupaten Cilacap dan Lajnah Pentashihan Mushaf Al-Qur’an (LPMQ) Kemenag RI,” paparnya.

                                Hadir sebagai narasumber dari Lajnah Pentashihan Mushaf Al-Qur’an (LPMQ) Kemenag RI, Kepala LPMQ H Abdul Aziz Sidqi, tim mushaf Al-Qur’an Isyarat Deni Hudaeny A Arifin, Tuti Nurkhayati, Muhammad Zamroni Ahbab, dan tim mushaf Al-Qur’an Braille Ahmad Jaeni, Samiah, Imam Mutaqien.

                                Kontributor: Ahmad Solkan
                                Editor: Kendi Setiawan

                                Sumber : nucare.id',
            'picture' => 'images/berita/6.jpg',
            'tanggal' => '2024-04-03',
            'id_kategori' => '5'
        ]);

        Berita::factory()->create([
            'title_berita' => 'NU Care-LAZISNU Cilacap Salurkan Paket Buka Puasa kepada Ratusan Santri',
            'slug' => 'nu-care-lazisnu-cilacap-salurkan-paket-buka-puasa-kepada-ratusan-santri',
            'description' => 'NU Care-LAZISNU Cilacap Jawa Tengah menyalurkan paket berbuka puasa untuk santri yatim dan dhuafa di Pondok Pesantren Tarbiyatul Aulad Cilacap Selatan, Jumat (15/03/2024). 

                                Direktur NU Care-LAZISNU Cilacap mengatakan bulan Ramadhan selalu menjadi momentum untuk berlomba-lomba dalam kebaikan.

                                “Salah satu bentuk kebaikan tersebut adalah dengan berbagi kepada santri,anak yatim dan duafa,” katanya.

                                Penyaluran paket berbuka puasa tersebut berupa buka puasa super Duk Duk Berbagi dari KFC Indonesia menyasar 200 penerima.

                                “Kami mengucapakan terima kasih kepada KFC Indonesia yang telah mempercayai LAZISNU Cilacap untuk menjadi partner dalam kegiatan ini,” imbuh Fauzi.

                                Sesuai dengan tema Ramadhan tahun ini yakni Mahabbah Ramadhan, lanjut Fauzi, NU Care-LAZISNU Cilacap juga mengadakan berbagai program ramadhan lainnya.

                                “Di antaranya Paket buka puasa untuk pejuang nafkah dan iftar bersama santri.” ujarnya.

                                Pengasuh Pondok Pesantren Tarbiyatul Aulad  KH Amrin Aulawi mengucapkan terima kasih atas bantuan dan program yang diberikan.

                                “Semoga LAZISNU Cilacap semakin dipercaya oleh masyarakat semakin besar dan semakin bertambah manfaat untuk masyarakat,” harapnya.

                                Kegiatan tersebut diawali dengan serah terima secara simbolis oleh Ketua LAZISNU Cilacap H Wasbah Samudera Fawaid dan diterima oleh KH Amrin Aulawi, dilanjutkan dengan Tausiyah singkat dan buka bersama.

                                Ketua LAZISNU Cilacap, H Wasbah Samudera Fawaid mengatakan NU Care-LAZISNU Cilacap diberikan amanah untuk menyalurkan paket buka puasa Super Dukduk Berbagi sebanyak 200 paket setiap Jumat.

                                “Paket tersebut untuk diberikan kepada santri, yatim, dhuafa, pejuang nafkah,” kata Wasbah.

                                Pewarta: Kendi Setiawan

                                Sumber : nucare.id',
            'picture' => 'images/berita/7.jpg',
            'tanggal' => '2024-03-21',
            'id_kategori' => '5'
        ]);

        petugas::factory()->create([
            'nama' => 'admin mobiznu',
            'no' => '1234567890',
            'bagian' => 'mobiznu',
        ]);

        petugas::factory()->create([
            'nama' => 'admin konsultasi zakat',
            'no' => '1234567890',
            'bagian' => 'konsultasi zakat',
        ]);

        petugas::factory()->create([
            'nama' => 'admin konfirmasi donasi',
            'no' => '1234567890',
            'bagian' => 'konfirmasi donasi',
        ]);

        petugas::factory()->create([
            'nama' => 'admin Pengaduan Gocap',
            'no' => '1234567890',
            'bagian' => 'Pengaduan',
        ]);

        Campaign::factory()->create([
            'title' => 'Donasi Palestina',
            'slug' => 'donasi-palestina',
            'description' => 'Bantu Palestina dengan Donasi Anda

                                Palestina membutuhkan kita sekarang lebih dari sebelumnya. Setiap hari, ribuan keluarga kehilangan tempat tinggal dan hidup dalam ketidakpastian akibat konflik yang berkepanjangan. Dengan donasi Anda, kita bisa memberikan harapan baru bagi mereka yang paling membutuhkan.
                                
                                [img1]
                                Berikan Bantuan untuk Pengungsi Palestina
                                Saat ini, banyak warga Palestina yang terpaksa tinggal di kamp pengungsian dengan kondisi memprihatinkan. Tenda-tenda darurat dan fasilitas yang terbatas menjadi tempat perlindungan mereka dari kekerasan yang terjadi. Donasi Anda dapat membantu menyediakan kebutuhan dasar seperti makanan, air bersih, dan perlindungan yang layak.
                                
                                [img2]
                                Dukung Tim Medis Palestina yang Berjuang di Garis Depan
                                Dalam situasi yang sangat sulit, tim medis Palestina bekerja tanpa lelah untuk merawat korban yang terluka. Donasi Anda dapat membantu menyuplai obat-obatan, peralatan medis, dan bantuan kesehatan yang sangat diperlukan.
                                
                                [img3]
                                Mari bersama-sama, ulurkan tangan dan bantu mereka yang terdampak di Palestina. Setiap rupiah yang Anda sumbangkan akan membawa perubahan besar bagi kehidupan mereka. Donasikan sekarang untuk Palestina dan jadilah bagian dari perubahan ini!',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 3,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Palestina',
            'main_picture' => 'Palestina.png',
            'second_picture' => 'Palestina.png',
            'last_picture' => 'Palestina.png',
        ]);

        Campaign::factory()->create([
            'title' => 'Donasi Korbang Gempa Bandung',
            'description' => 'Bantu Korban Gempa di Bandung dengan Donasi Anda

                                Gempa bumi yang baru-baru ini mengguncang Bandung telah menyebabkan kerusakan besar dan membuat ribuan orang kehilangan tempat tinggal. Banyak keluarga kini berada dalam kondisi yang sangat memprihatinkan. Dengan donasi Anda, kita bisa membantu mereka memulihkan kehidupan dan memberikan kebutuhan mendesak seperti makanan, air bersih, dan tempat tinggal sementara.

                                [img1]
                                Berikan Bantuan Darurat untuk Pengungsi Gempa di Bandung
                                Ratusan warga kini terpaksa tinggal di tenda pengungsian setelah gempa menghancurkan rumah-rumah mereka. Mereka sangat membutuhkan bantuan darurat berupa selimut, pakaian, makanan, dan air bersih. Mari kita bersama-sama berikan bantuan untuk meringankan penderitaan mereka.

                                [img2]
                                Dukung Tim SAR dan Medis yang Bekerja Tak Kenal Lelah
                                Tim penyelamat dan medis saat ini bekerja keras di lapangan untuk membantu para korban gempa. Dengan donasi Anda, kita dapat menyediakan peralatan yang dibutuhkan untuk upaya pencarian dan pertolongan serta mendukung tim medis dalam memberikan perawatan kepada yang terluka.

                                [img3]
                                Donasikan Sekarang untuk Bandung!
                                Mari kita bergerak bersama untuk membantu saudara-saudara kita yang terkena dampak gempa di Bandung. Setiap kontribusi, besar atau kecil, akan sangat berarti dalam memulihkan kondisi mereka. Donasi sekarang dan kirimkan harapan baru untuk Bandung.',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 1,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Bandung',
            'main_picture' => 'Bandung.png',
            'second_picture' => 'Bandung.png',
            'last_picture' => 'Bandung.png',
            'slug' => 'donasi-korban-gempa-bandung'
        ]);

        Campaign::factory()->create([
            'title' => 'Kritis! Tolong Hasna Sembuh dari Penyakit Kulit Langka',
            'slug' => 'kritis-tolong-hasna-sembuh-dari-penyakit-kulit-langka',
            'description' => 'Bantu Hasna dengan Donasi Anda

                                Sudah 3 tahun berlalu sejak Hasna mengalami kejang-kejang dan muncul bintik merah di kulitnya. Saat ini, kondisi kulit Hasna semakin memburuk karena kulitnya menjadi berlendir, terdapat sensasi seperti terbakar, bahkan hingga terkelupas.

                                [img1]
                                Ibu Eli (41), Ibunda Hasna, menyatakan bahwa pada Desember 2022, Hasna mengalami demam yang disertai dengan kejang-kejang dan muncul bintik kemerahan di kulitnya. Khawatir dengan kondisi anaknya, Ibu Eli segera membawa Hasna berobat ke RSUD Majenangan, Cilacap.

                                “Di RSUD Majenang dokter mendiagnosa sakit sindrom steven johnson dan dirawat selama 17 hari untuk penyembuhan kulit, pulang 2 hari di rumah langsung sesak nafas lagi.” cerita Ibu Eli.

                                Semakin hari kondisi Hasna semakin memburuk. Bahkan, mata Hasna sulit terbuka karena mengalami pembengkakan dan tidak bisa dibuka. Melihat keadaan Hasna yang semakin mengkhawatirkan, Ibu Eli kembali membawa Hasna berobat ke RSUD Banyumas pada bulan Januari 2023. Di sana, Hasna mendapatkan perawatan selama 12 hari.

                                “Kondisi masih belum sembuh, akhirnya dibawa ke RS Sardjito Yogyakarta. Dicek kesehatan masih sesak nafas, ditangani selama 20 hari. Belum mengalami perubahan apapun. Hasna berobat kontrol di RS Duta Mulya kondisi Hasna sudah sangat parah matanya tidak sanggup untuk membuka,” tutur Ibunda Hasna.

                                [img2]
                                Ibu Eli dan suaminya, Pak Marzuki (48 tahun), sudah kebingungan harus membawa Hasna berobat ke mana lagi. Sebenarnya mereka sudah dirujuk untuk membawa Hasna berobat ke rumah sakit yang lebih besar, tetapi kondisi keuangan Pak Marzuki sebagai buruh harian lepas hanya sanggup membiayai kehidupan mereka sehari-hari saja.

                                Selama membawa Hasna berobat, kedua orang tuanya mengandalkan bantuan dari BPJS dan donasi yang dikumpulkan oleh pihak donatur NU Care LAZISNU Cilacap.

                                Namun, tentu saja penyakit langka ini tidak bisa disembuhkan dengan mudah. Masih banyak rangkaian pengobatan yang harus Hasna lakukan dan tidak semua biayanya bisa di-cover oleh BPJS.

                                [img3]
                                “Saya sangat sedih, anak saya, Hasna harus seperti ini. Besar harapan saya agar bisa membawa Hasna berobat sampai sembuh dan melihatnya tertawa dan bermain.” lirih Pak Marzuki, ayah Hasna, sambil menahan air matanya yang keluar.

                                Sahabat NU Care, mari kita bersama-sama temani Hasna melawan penyakit langka yang dideritanya agar kembali sehat, bisa melihat, tertawa, dan bermain bersama teman-temannya. Setiap kontribusi yang Anda berikan akan membantu memberikan perawatan yang diperlukan dan membawa harapan bagi Hasna dan keluarganya.

                                Mari kita bergandengan tangan untuk membantu Hasna mengalahkan Sindrom Stevens-Johnson.',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 6,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Cilacap',
            'main_picture' => 'Cilacap.jpg',
            'second_picture' => 'Cilacap.jpg',
            'last_picture' => 'Cilacap.jpg',
        ]);

        Campaign::factory()->create([
            'title' => 'SEDEKAH AL QUR’AN UNTUK PARA SANTRI PENGHAFAL ALQUR’AN DI PELOSOK',
            'slug' => 'sedekah-al-quran-untuk-para-santri-penghafal-alquran-di-pelosok',
            'description' => '#SedekahseribuQuran

                                Allah Swt. memberikan kita berbagai kemudahan dalam kehidupan. Bahkan kini, kita bisa berbagi cinta-Nya kepada sesama, menebar kebaikan, dan mengundang pahala terus mengalirkan keberkahan dunia-akhirat.

                                [img1]
                                Seperti pada beberapa waktu lalu, alhamdulillah kami bisa bertemu adik-adik di pelosok Indonesia. Mereka insyaallah anak-anak soleh-solehah. Lihat saja, bagaimana kegembiraan mereka memeluk kalam Allah, Al-Qur’an yang kami salurkan. Meski perjalanannya tidak mudah, bukankah kita selalu yakin bahwa ikhtiar kita pada jalan yang baik selalu Allah berikan petunjuk ‘kan?

                                [img2]
                                Al-Qur’an adalah pedoman kita, pegangan hidup kita. Namun, apa jadinya jika kita kehilangan nikmat dari ayat-ayat yang diturunkan kepada Nabi Muhammad saw. itu. Seperti adik-adik kita di Papua ini, semangat belajar Islam pada diri mereka tidak lengkap tanpa mushaf yang layak. Ini baru satu lokasi kecil saja di Indonesia, Sahabat. Masih banyak adik-adik kita penerus bangsa & agama, yang menunggu kita kirimkan hadiah Al-Qur’an baru.

                                [img3]
                                “Sesungguhnya di antara amalan dan kebaikan seorang mukmin yang akan menemuinya setelah kematiannya adalah: ilmu yang diajarkan dan disebarkannya, anak shalih yang ditinggalkannya, mushaf Al Quran yang diwariskannya…”
                                (HR. Ibnu Majah & Baihaqi)

                                #SahabatPeduli, yuk bersama-sama wujudkan program Sedekah Seribu Qur’an',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 2,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Cilacap',
            'main_picture' => 'Cilacap2.webp',
            'second_picture' => 'Cilacap2.webp',
            'last_picture' => 'Cilacap2.webp',
        ]);

        Campaign::factory()->create([
            'title' => 'MAHABBAH QURBAN – QURBAN BARENG, BERKAH BARENG',
            'slug' => 'mahabbah-qurban-qurban-bareng-berkah-bareng',
            'description' => '“Maka laksanakanlah sholat karena Tuhanmu, dan berkurbanlah (sebagai ibadah untuk mendekatkan diri kepada Allah).” (QS. Al-Kautsar: 2)

                                Qurban merupakan salah satu ibadah yang mempunyai makna sangat penting. Qurban bukanlah sekedar sebuah ritual, namun ia juga merupakan bentuk kepedulian dan kasih sayang kita kepada sesama.

                                [img1]
                                Dengan berqurban, kita tidak hanya memberikan daging kepada yang membutuhkan, namun juga memberikan harapan, kebahagiaan, dan kehangatan kepada mereka yang kurang beruntung.

                                Momentun Qurban ini menjadi momentum saling berbagi kepada yang membutuhkan, terutama masyarakat yang jarang sekali merasakan daging.

                                [img2]
                                Masih banyak masyarakat pelosok yang menantikan daging hewan qurban namun desa mereka hanya mempunyai 1 atau 2 hewan qurban dan bahkan banyak desa yang tidak mempunyai hewan qurban sama sekali.

                                Yuk Sahabat peduli kita #kolaborasikankebaikan untuk memberikan senyum kebahagiaan masyarakat pelosok.

                                [img3]
                                Satu hewan Qurban yang #Sahabatpeduli berikan, memberikan sejuta senyum kebahagiaan untuk masyarakat yang membutuhkan.

                                “Agar mereka menyaksikan berbagai manfaat untuk mereka dan agar mereka menyebut nama Allah pada beberapa hari yang telah ditentukan atas rezeki yang diberikan Dia kepada mereka berupa hewan ternak. Maka makanlah sebagian darinya dan (sebagian lagi) berikanlah untuk dimakan orang-orang yang sengsara dan fakir.” (Al Hajj :28)',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 2,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Cilacap',
            'main_picture' => 'qurban.webp',
            'second_picture' => 'qurban.webp',
            'last_picture' => 'qurban.webp',
        ]);

        Campaign::factory()->create([
            'title' => 'Kacamata Gratis untuk Santri dan Guru Ngaji',
            'slug' => 'kacamata-gratis-untuk-santri-dan-guru-ngaji',
            'description' => 'Abi Hurairah ra, bahwasannya Rasulullah saw bersabda: “Apabila seorang manusia telah meninggal dunia, maka terputuslah amal perbuatannya kecuali tiga hal; sedekah jariyah, illmu yang bermanfaat, anak shalih yang mendo’akannya.”

                                Dalam rangka peduli guru ngaji dan Santri, NU Care LAZISNU Cilacap luncurkan program kaca mata gratis untuk santri dan guru ngaji.

                                [img1] [img2]
                                Program tersebut bertujuan untuk guru ngaji dan santri yang mengalami kelemahan pandangan supaya dapat melihat dengan jelas.
                                
                                [img3]
                                Yuk ikut berdonasi #kacamatagratis untuk santri dan guru ngaji, semoga dengan bersedekah dihari Jumat pahala dilipatgandakan',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 6,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Cilacap',
            'main_picture' => 'kacamata.jpeg',
            'second_picture' => 'kacamata.jpeg',
            'last_picture' => 'kacamata.jpeg',
        ]);

        Campaign::factory()->create([
            'title' => 'Ketahanan Pangan',
            'slug' => 'ketahanan-pangan',
            'description' => 'Sahabat Peduli ?

                                Sadarkah kita ? Bahwa  hari ini kita masih bisa tersenyum mekar, Bahagia, hidup dalam kecukupan, bisa membeli apa saja yang jadi keinginan.

                                Sadarkah kita ? Bahwa hari ini kita masih bisa tidur dengan nyenyak, dengan perut yang kenyang, tanpa kekhawatiran.

                                [img1]
                                Lihatlah diluar sana masih banyak saudara kita hidup dalam kekurangan. Siang dan malamnya perut tak tak jarang kelaparan, pikiran dipenuhi kekhawatiran entah besok bisa makan.

                                Sahabat Peduli kenalkan keluarga bapak Arif Sujoko yang beralamat di Kelurahan Tambakreja, Cilacap Selatan, Cilacap.

                                [img2]
                                “Saya makan kalau nunggu bapak saya pulang kerja, saya makan 1 kali, sore hari saya baru bisa makan,” ungkap Adek Cahyono

                                Setiap harinya pak Arif bekerja sebagai nelayan di PPS Cilacap, untuk penghasilan pun tidak seberapa untuk mencukupi kebutuhannya.

                                Oleh karena itu NU Care LAZISNU Cilacap menginisiasi adanya program Ketahanan Pangan untuk keluarga bapak Arif dan keluarga dhuafa lainnya. Selain itu program ketahanan pangan disalurkan untuk Pondok Pesantren, santri penghafal Al Quran dan guru ngaji.

                                [img3]
                                Donasi yang terkumpul nantinya akan digunakan untuk;

                                1. Distribusi pangan untuk Keluarga Dhuafa
                                2. Distribusi pangan untuk santri pondok pesantren dan penghafal al-Qur’an
                                3. Distribusi pangan untuk Guru Ngaji
                                #SahabatPeduli, yuk bersama-sama wujudkan program ketahanan pangan',
            'goal' => 100000000,
            'raised' => 0,
            'id_kategori' => 6,
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => 50000,
            'lokasi' => 'Cilacap',
            'main_picture' => 'pangan.png',
            'second_picture' => 'pangan.png',
            'last_picture' => 'pangan.png',
        ]);

        pilar_program::factory()->create([
            'id_kategori' => 4,
            'nama' => 'NU Care Berdaya',
            'slug' => 'nu_care_berdaya',
            'deskripsi' => 'program untuk memdorong kemandirian dan meningkatkan pendapat, kesejahteraan serta semangat kewirausahaan melalui kegiatan ekonomi dan pembentukan usaha',
            'img' => 'images/pilar_program/berdaya.png',
            'sdgs' => '10000001000000000',
        ]);

        pilar_program::factory()->create([
            'id_kategori' => 2,
            'nama' => 'NU Care Cerdas',
            'slug' => 'nu_care_cerdas',
            'deskripsi' => 'program untuk meningkatkan kualitas sumber daya manusia (SDM) melalui penyediaan beasiswa, pelatihan, dan memperkuat fasilitas pendidikan, baik di tingkat sekolah dasar, menengah, & perguruan tinggi. program ini bertujuan untuk menjamin akses pendidikan berkualitas yang merata, serta membuka kesempatan belajar bagi semua orang, khususnya bagi siswa yatim-dhuafa dan berprestasi',
            'img' => 'images/pilar_program/cerdas.png',
            'sdgs' => '00000000000100001',

        ]);

        pilar_program::factory()->create([
            'id_kategori' => 6,
            'nama' => 'NU Care Sehat',
            'slug' => 'nu_care_sehat',
            'deskripsi' => 'Program untuk meningkatkan layanan di bidang kesehatan masyarakat, khususnya dikalangan keluarga kurang mampu melalui tindakan kuratif maupun kegiatan preventif.',
            'img' => 'images/pilar_program/sehat.png',
            'sdgs' => '00100000000000000',

        ]);

        pilar_program::factory()->create([
            'id_kategori' => 3,
            'nama' => 'NU Care Damai',
            'slug' => 'nu_care_damai',
            'deskripsi' => 'program untuk meningkatkan layanan sosial dengan semangat
                            dakwah Islam Ahlussunnah Wal Jama’ah dan misi kemanusiaan, baik dalam bentuk kebencanaan maupun bantuan sosial lainnya yang
                            dilakukan secara sistematik dan melibatkan mitra internal dan eksternal NU.',
            'img' => 'images/pilar_program/damai.png',
            'sdgs' => '00000000000000001',

        ]);

        pilar_program::factory()->create([
            'id_kategori' => 1,
            'nama' => 'NU Care Hijau',
            'slug' => 'nu_care_hijau',
            'deskripsi' => 'program yang diarahkan untuk memelihara lingkungan dan sumber daya alam serta pemanfaatannya secara bijaksana dan
                                mendorong keberlanjutan alam sebagai sumber penghidupan masyarakat.',
            'img' => 'images/pilar_program/hijau.png',
            'sdgs' => '00000110000010000',

        ]);

        pilihan_qurban::factory()->create([
            'nama' => '1/7 Sapi (250 - 300kg)',
            'harga' => 3000000,
        ]);

        pilihan_qurban::factory()->create([
            'nama' => 'Kambing Standar (25 - 28kg)',
            'harga' => 3000000,
        ]);

        pilihan_qurban::factory()->create([
            'nama' => 'Kambing Premium (28 - 35kg)',
            'harga' => 3200000,
        ]);

        pilihan_qurban::factory()->create([
            'nama' => 'Domba Luar Negeri (45 - 60kg)',
            'harga' => 5500000,
        ]);

        pilihan_infaq::factory()->create([
            'pil_infaq' => 'Umum',
        ]);

        pilihan_wakaf::factory()->create([
            'pil_wakaf' => 'Umum',
        ]);

        Komponen_Ziwaf::factory()->create([
            'harga_emas' => 1000000,
            'nisab' => 1000000,
            'nisab_kg' => 653,
            'fidyah' => 30000,
            'nominal_fitrah' => 30000
        ]);

    }
}