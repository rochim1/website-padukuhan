<?php

return [
    'name' => env('VILLAGE_NAME', 'Padukuhan Sumberarum'),
    'location' => 'Kalurahan Sumberharjo, Kapanewon Prambanan, Kabupaten Sleman',
    'province' => 'Daerah Istimewa Yogyakarta',
    'address' => 'Jl. Sumber Makmur No. 12, Sumberharjo, Prambanan, Sleman 55572',
    'email' => 'sapa@sumberarum.id',
    'phone' => '0812-3456-7890',
    'official' => ['name' => 'Budi Santosa', 'position' => 'Kepala Dukuh'],
    'stats' => [
        ['value' => '1.248', 'label' => 'Penduduk', 'icon' => 'ri-group-line'],
        ['value' => '386', 'label' => 'Kepala Keluarga', 'icon' => 'ri-home-heart-line'],
        ['value' => '8', 'label' => 'Rukun Tetangga', 'icon' => 'ri-community-line'],
        ['value' => '126 ha', 'label' => 'Luas Wilayah', 'icon' => 'ri-landscape-line'],
    ],
    'activities' => [
        ['slug'=>'kerja-bakti-jalur-hijau','date' => '28 Juli 2026', 'title' => 'Kerja Bakti dan Penataan Jalur Hijau', 'excerpt' => 'Warga bergotong royong membersihkan lingkungan dan menanam pohon peneduh di sepanjang jalan padukuhan.', 'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=1200&q=82','location'=>'Jalan utama dan lingkungan RT 01–04','content'=>'Kegiatan dimulai sejak pukul 07.00 dengan pembagian kelompok untuk pembersihan drainase, pemangkasan tanaman, dan penanaman pohon. Bibit disiapkan kelompok tani bersama Karang Taruna. Warga juga menyepakati jadwal perawatan bergilir agar jalur hijau tumbuh baik dan tidak mengganggu akses jalan.'],
        ['slug'=>'pelatihan-pemasaran-digital-umkm','date' => '20 Juli 2026', 'title' => 'Pelatihan Pemasaran Digital UMKM', 'excerpt' => 'Pelaku usaha lokal belajar fotografi produk, katalog digital, dan pengelolaan pesanan melalui kanal daring.', 'image' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=82','location'=>'Balai Warga Sumberarum','content'=>'Pelatihan menghadirkan praktisi pemasaran digital dan diikuti pelaku kuliner, kerajinan, serta pertanian. Peserta mempraktikkan pembuatan foto produk sederhana, penulisan deskripsi, pengelolaan katalog, dan pencatatan pesanan. Pendampingan lanjutan dilakukan oleh tim pemuda setiap dua pekan.'],
        ['slug'=>'posyandu-terpadu-lansia','date' => '12 Juli 2026', 'title' => 'Posyandu Terpadu dan Pemeriksaan Lansia', 'excerpt' => 'Layanan kesehatan rutin untuk balita, ibu, dan warga lanjut usia bersama kader kesehatan padukuhan.', 'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=82','location'=>'Gedung Posyandu Melati','content'=>'Pelayanan meliputi penimbangan balita, pemantauan tumbuh kembang, konsultasi gizi, pemeriksaan tekanan darah, dan edukasi kesehatan lansia. Kader mengingatkan warga untuk membawa buku kesehatan dan datang sesuai pembagian waktu per RT.'],
    ],
    'potentials' => [
        ['slug'=>'kerajinan-bambu','title' => 'Kerajinan Bambu', 'category' => 'Ekonomi Kreatif', 'icon' => 'ri-brush-line', 'text' => 'Produk rumah tangga dan dekorasi buatan perajin lokal dengan bahan bambu berkelanjutan.','owner'=>'Kelompok Perajin Wening','contact'=>'0812-1111-2233','image'=>'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?auto=format&fit=crop&w=1200&q=82'],
        ['slug'=>'kebun-pangan-warga','title' => 'Kebun Pangan Warga', 'category' => 'Pertanian', 'icon' => 'ri-plant-line', 'text' => 'Sayur, rempah, dan hasil kebun dikelola kelompok tani serta pekarangan pangan lestari.','owner'=>'Kelompok Tani Makmur','contact'=>'0812-2222-3344','image'=>'https://images.unsplash.com/photo-1500651230702-0e2d8a49d4ad?auto=format&fit=crop&w=1200&q=82'],
        ['slug'=>'jelajah-sungai','title' => 'Jelajah Sungai', 'category' => 'Wisata', 'icon' => 'ri-route-line', 'text' => 'Rute jalan kaki menyusuri bentang alam, persawahan, dan kehidupan sehari-hari warga.','owner'=>'Pokdarwis Sumberarum','contact'=>'0812-3333-4455','image'=>'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=82'],
    ],
    'tourism' => [
        ['slug'=>'jelajah-sungai','title'=>'Jelajah Sungai','tagline'=>'Wisata Alam & Kehidupan Warga','description'=>'Rute jalan kaki menyusuri bentang alam, persawahan, aliran sungai, dan kehidupan sehari-hari warga.','image'=>'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1600&q=86','gallery'=>['https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=84','https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=84'],'address'=>'Padukuhan Sumberarum, Prambanan, Sleman','contact'=>'0812-3333-4455','opening_hours'=>'Setiap hari, 07.00–17.00','ticket_price'=>'Donasi sukarela','facilities'=>['Area parkir','Pemandu lokal','Warung warga'],'activities'=>['Jelajah sungai','Trekking persawahan','Fotografi alam'],'latitude'=>-7.755,'longitude'=>110.49,'booking_url'=>'','seo_description'=>'Jelajahi sungai, persawahan, dan kehidupan warga di Padukuhan Sumberarum.'],
    ],
    'services'=>[
        ['slug'=>'surat-pengantar','title'=>'Surat Pengantar','icon'=>'ri-file-user-line','estimate'=>'1 hari kerja','requirements'=>['KTP pemohon','Kartu Keluarga','Keterangan tujuan permohonan'],'steps'=>['Siapkan dokumen','Temui petugas atau ajukan daring','Verifikasi data','Surat diterbitkan']],
        ['slug'=>'keterangan-domisili','title'=>'Keterangan Domisili','icon'=>'ri-home-4-line','estimate'=>'1–2 hari kerja','requirements'=>['KTP pemohon','Kartu Keluarga','Bukti tempat tinggal bila diperlukan'],'steps'=>['Lengkapi identitas','Verifikasi alamat','Persetujuan Dukuh','Dokumen selesai']],
        ['slug'=>'pengantar-pindah','title'=>'Pengantar Pindah','icon'=>'ri-user-shared-line','estimate'=>'2–3 hari kerja','requirements'=>['KTP seluruh anggota yang pindah','Kartu Keluarga','Alamat tujuan lengkap'],'steps'=>['Konsultasi petugas','Pemeriksaan dokumen','Pencatatan mutasi','Pengantar diterbitkan']],
        ['slug'=>'pengantar-usaha','title'=>'Pengantar Usaha','icon'=>'ri-building-line','estimate'=>'1–2 hari kerja','requirements'=>['KTP pemohon','Kartu Keluarga','Alamat dan jenis usaha'],'steps'=>['Isi keperluan','Verifikasi lokasi','Persetujuan','Ambil surat']],
    ],
    'officials'=>[
        ['name'=>'Budi Santosa','position'=>'Kepala Dukuh','icon'=>'ri-user-star-line'],['name'=>'Sri Lestari','position'=>'Sekretaris','icon'=>'ri-file-list-2-line'],['name'=>'Agus Wibowo','position'=>'Koordinator Keamanan','icon'=>'ri-shield-user-line'],['name'=>'Rina Handayani','position'=>'Koordinator Kesejahteraan','icon'=>'ri-hand-heart-line'],['name'=>'Dimas Prakoso','position'=>'Ketua Karang Taruna','icon'=>'ri-team-line'],
    ],
    'facilities'=>[
        ['name'=>'Balai Warga','type'=>'Pelayanan','icon'=>'ri-government-line','address'=>'RT 03, pusat Padukuhan'],['name'=>'Posyandu Melati','type'=>'Kesehatan','icon'=>'ri-heart-pulse-line','address'=>'RT 02, samping PAUD'],['name'=>'Lapangan Sumberarum','type'=>'Olahraga','icon'=>'ri-football-line','address'=>'RT 05, sisi timur'],['name'=>'Mushola Al-Ikhlas','type'=>'Ibadah','icon'=>'ri-moon-line','address'=>'RT 01, jalan utama'],['name'=>'Rumah Pilah Sampah','type'=>'Lingkungan','icon'=>'ri-recycle-line','address'=>'RT 06, area kebun'],['name'=>'Taman Baca Warga','type'=>'Pendidikan','icon'=>'ri-book-open-line','address'=>'Kompleks Balai Warga'],
    ],
    'gallery'=>[
        'https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=900&q=82','https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=82','https://images.unsplash.com/photo-1500651230702-0e2d8a49d4ad?auto=format&fit=crop&w=900&q=82','https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=82','https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=900&q=82','https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=900&q=82'
    ],
];
