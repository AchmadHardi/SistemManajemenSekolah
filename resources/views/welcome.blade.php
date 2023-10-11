<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Jakarta</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            color: #1b1919;
            font-weight: lighter;
        }

        .top {
            background-image: url(asset('img/bg.jpg'));
            background-size: cover;
            height: 90vh;
            opacity: 90%;
            z-index: -2;
        }

        .menu img {
            float: left;
            width: 300px;
            padding-left: 90px;
        }

        .bghitam {
            background: black;
            height: 90vh;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            opacity: 50%;
            z-index: -3;
            color: #000;
        }

        .menu_new ul {
            list-style: none;
            display: inline-flex;
            float: right;
            /* Adjust the positioning as needed */
            padding-right: 30px;
            /* Add some padding to separate from the edge */
            padding-top: 20px;
            color: #141414;

        }

        .menu ul {
            list-style: none;
            display: inline-flex;
            float: left;
            /* Adjust the positioning as needed */
            padding-left: 20px;
            /* Add some padding to separate from the edge */
            padding-top: 20px;
            color: #000;
        }

        .menu ul li {
            padding-right: 20px;
        }

        .menu ul li a {
            text-decoration: none;
            cursor: pointer;
            color: white;
        }

        .menu ul li a:hover {
            color: #1CAAE9;
        }

        .text {
            text-align: right;
            padding-right: 90px;
            padding-top: 230px;
            color: white;
            font-weight: lighter;
        }

        .text h1 {
            font-size: 40px;
        }

        .text p {
            font-size: 25px;
        }

        .text span {
            background: #1CAAE9;
            border-radius: 50px;
            padding: 15px;
        }

        .text span a {
            text-decoration: none;
            color: white;
            border: 1px solid transparent;
            padding-top: 20px;
        }

        #jurusan {
            padding-top: 50px;
            text-align: center;
        }

        #jurusan h2 h3 p {
            font-weight: lighter;
        }

        #jurusan p {
            opacity: 70%;
        }

        .keahlian img {
            width: 50px;
        }

        .keahlian {
            padding-top: 50px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            width: 80%;
            margin: auto;
        }

        .depan {
            opacity: 70%;
            padding-top: 50px;
        }

        .depan img {
            width: 100%;
            z-index: -3;
            height: 300px;
        }

        .struktur img {
            width: 100px;
        }

        .organisasi {
            text-align: center;
            font-weight: lighter;
            padding-top: 50px;
        }

        .organisasi h1 {
            opacity: 80%;
        }

        .organisasi p {
            opacity: 50%;
        }

        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .subscribe {
            background: black;
            height: 100px;
            color: white;
            font-weight: lighter;
            text-align: center;
            opacity: 90%;
            padding-top: 20px;
            padding-bottom: 40px;
        }

        .subscribe a {
            border: 1px solid transparent;
            background: red;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        .berita {
            text-align: center;
            padding-top: 50px;
        }

        .berita p {
            opacity: 50%;
        }

        .grid4 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            width: 90%;
            margin: auto;
        }

        .grid3 p h2 {
            text-align: left;
        }

        .grid3 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.19);
            padding: 20px;
        }

        .grid3 a {
            text-decoration: none;
            border: 1px solid transparent;
            padding: 10px;
            background: #1CAAE9;
            border-radius: 50px;
            color: white;
        }

        .grid3 img {
            border-radius: 4px 4px 0 0;
        }

        .kontak {
            background-image: url(img/bg2.png);
            height: 80vh;
            background-size: cover;
            width: 100%;
        }

        .des {
            width: 20%;
            padding-left: 120px;
            color: white;
            padding-top: 80px;
        }

        .footer {
            background: black;
            color: white;
            opacity: 90%;
            padding: 20px;
            padding-left: 120px;
        }

        .footer p {
            opacity: 50%;
        }

        .footer a {
            text-decoration: none;
            color: white;
        }

        .bg-image {
            background-image: url('{{ asset('img/sekolah.jpg') }}');
            background-size: 100% 100%;
            /* This will cover the entire element */
            background-position: center;
            height: 90vh;
            opacity: 0.5;
            z-index: -2;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        /* For small screens (up to 576px) */
        @media (max-width: 576px) {
            .menu img {
                width: 200px;
                /* Reduce image size for smaller screens */
                padding-left: 20px;
            }
        }

        /* For medium screens (up to 768px) */
        @media (max-width: 768px) {
            .menu img {
                width: 250px;
                /* Adjust image size for medium screens */
                padding-left: 50px;
            }

        }
    </style>
</head>

<body>

    <div class="top">

        <div class="bg-image"></div>

        <div class='bghitam'></div>

        <div class="menu">

            <ul>

                <li><a href="">BERANDA</a></li>

                <li><a href="">PROGRAM KEAHLIAN</a></li>

                <li><a href="">GURU & KARYAWAN</a></li>

                <li><a href="">GALLERY</a></li>

                <li><a href="">FASILITAS</a></li>

            </ul>

        </div>
        <div class="menu_new">

            <ul>

                <li @class([
                    'nav-item',
                    'active fw-semibold' => Request()->is('register*'),
                ])>
                    <a @class(['nav-link']) href="{{ route('register') }}">Register</a>
                </li>

                <li @class(['nav-item', 'active fw-semibold' => Request()->is('login*')])>
                    <a @class(['nav-link']) href="{{ route('login') }}">Login</a>
                </li>

            </ul>

        </div>

        <div class="text">

            <h1 class="mb-5">SMK Negeri 1 Tangerang</h1>

        </div>

    </div>



    <div id="jurusan">

        <h2>KOMPETENSI KEAHLIAN</h2>

        <p>Berikut ini adalah uraian singkat Jurusan di SMK Negeri 1</p>

        <div class='grid'>

            <div class='keahlian'>

                <a href=""><img src="{{ asset('img/busana.jpg') }}" width="100px"></a>

                <h3>Tata Busana</h3>

                <p>Program studi Tata Busana sering juga disebut dengan nama Fashion Design. Pada Program studi ini di
                    pelajari teknik mendesain, belajar membuat pola, menjahit, dan seluk beluk produksi busana atau
                    fashion.</p>

            </div>

            <div class='keahlian'>

                <a href=""><img src="{{ asset('img/tata.jpg') }}"></a>

                <h3>Tata Boga</h3>

                <p>Program studi Tata Boga mempelajari teknik penyajian makanan dengan memperhatikan kualitas, rasa,
                    estetika, dan kebutuhan gizi. Akan mempelajari mengolah berbagai hidangan dari daerah dan negara.
                </p>

            </div>

            <div class='keahlian'>

                <a href=""> <img src="{{ asset('img/industri.jpg') }}"></a>

                <h3>Otomasi Industri</h3>

                <p>Teknik otomasi insustri adalah suatu teknik yang menerapkan sistem pengajaran yang mengarah ke bidang
                    perakitan sistem-sistem di dunia industri yang berbasis otomasis/outomatic.</p>

            </div>

            <div class='keahlian'>

                <a href=""> <img src="{{ asset('img/listrik.jpg') }}"></a>

                <h3>Teknik Listrik</h3>

                <p>Teknik Tenaga Listrik adalah bidang ilmu yang mempeljari teknik-teknik yang berhubungan dengan tenaga
                    listrik dan permasalahannya sehingga tenaga listrik dapat disalurkan dengan baik.</p>

            </div>

            <div class='keahlian'>

                <a href=""> <img src="{{ asset('img/mesin.jpg') }}"></a>

                <h3>Teknik Mesin</h3>

                <p>Teknik Mesin adalah ilmu teknik mengenai aplikasi dari prinsip fisika untuk analisis, desain,
                    manufuktur, dan pemeliharaan sebuah sistem mekanik.</p>

            </div>

            <div class='keahlian'>

                <a href=""><img src="{{ asset('img/rpl.jpg') }}"></a>

                <h3>Rekayasa Perangkat Lunak</h3>

                <p>Program Rekayasa Perangkat Lunak adalah satu bidang profesi yang mendalami cara-cara pengembangan
                    perangkat lunak termasuk pembuatan, pemeliharaan, menajemen organisasi pengembangan perangkat lunak
                    dan menajemen kualitas.</p>

            </div>

        </div>



    </div>

    {{-- <div class="depan">

        <img src="{{ asset('img/school.jpg') }}">

    </div> --}}

    <div class="organisasi">

        <h1>STRUKTUR ORGANISASI</h1>

        <p>Struktur organisasi di SMK Negeri 1</p>

        <div class="grid2">



            <div class="struktur">

                <img src="{{ asset('img/kepsek.jpg') }}">

                <h2>Dr. Maria Wijaya</h2>

                <p><b>KEPALA SEKOLAH</b></p>

                <p>menjabat kepala sekolah</p>

            </div>

            <div class="struktur">

                <img src="{{ asset('img/wakdur.jpg') }}">

                <h2> Drs. Andi Prasetyo</h2>

                <p><b>WAKA KURIKULUM</b></p>

                <p>Menjabat wakil kepala sekolah kurikulum</p>

            </div>

            <div class="struktur">

                <img src="{{ asset('img/waka.jpg') }}">

                <h2>Ahmad Syahputra</h2>

                <p><b>WAKA KESISWAAN</b></p>

                <p>menjabat wakil kepala sekolah kesiswaan</p>

            </div>

            <div class="struktur">

                <img src="{{ asset('img/humas.jpg') }}">

                <h2> Siti Rahayu</h2>

                <p><b>WAKA HUMAS</b></p>

                <p>menjabat wakil kepala sekolah humas</p>

            </div>

        </div>

        <div class="struktur">

            <img src="{{ asset('img/adu.jpg') }}">

            <h2>Andi Prinanda</h2>

            <p><b>WAKA SARANA PRASARANA</b></p>

            <p>menjabat wakil kepala sekolah sarana prasarana</p>

        </div>



    </div>

    <div class="subscribe">

        <h1>Official SMK Negeri 1 Tangerang</h1>

        <a href='#'>SUBSCRIBE</a>

    </div>

    <div class="berita">

        <h1>BERITA TERBARU</h1>

        <p>Menyajikan informasi di SMKN 1</p>

        <div class="grid4">

            <div class="grid3">

                <img src="{{ asset('img/spp.jpg') }}" width="200px">

                <p>BERITA TERBARU</p>

                <h2>Siap-siap! SPP SMA dan SMK di Tangerang Bakal Naik, Segini Biaya yang Mungkin Harus Dibayar Ortu</h2>

                <p>SURYAMALANG.COM, Tangerang – Para wali murid jenjang SMA dan SMK harus siap mengeluarkan anggaran
                    lebih besar untuk biaya pendidikan anak-anaknya. Sebab, Dinas Pendidikan (Dindik) Tangerang(Tangerang)
                    berencana menaikkan besaran SPP mulai tahun ajaran baru pada Juli 2018. Kepala Dindik Tangerang, Saiful
                    Rachman</p>

                <a href="">READ MORE...</a>

            </div>

            <div class="grid3">

                <img src="{{ asset('img/beri.jpg') }}" width="210px">

                <p>BERITA TERBARU</p>

                <h2>SPP SMK Negeri dan Swasta di Tangerang</h2>

                <p>Surabaya – Kebijakan SPP gratis di Tangerangtidak hanya untuk SMA dan SMK Negeri. Kebijakan yang
                    akan dimulai bulan Juli ini juga berlaku untuk sekolah swasta. Namun, ada regulasi yang berbeda.
                    Kepala Dinas Pendidikan Tangerang Saiful Rachman mengatakan kebijakan</p>

                <a href="">READ MORE...</a>

            </div>

            <div class="grid3">

                <img src="{{ asset('img/lum.jpg') }}" width="180px">

                <p>BERITA TERBARU</p>

                <h2>Pengumuman SBMPTN Bagi siswa</h2>

                <p>Menjelang tahun ajaran baru, berbagai kesibukan mulai tampak terjadi. Kesibukan karena mempersiapkan
                    berbagai kebutuhan untuk memasuki sekolah baru, ujian naik kelas, ujian nasional bahkan persiapan
                    tes masuk perguruan tinggi idaman. Hari-hari ini pihak sekolah terutama</p>

                <a href="">READ MORE...</a>

            </div>

        </div>

    </div>

    <div class="kontak">

        <div class="des">

            <h1>Pusat Informasi</h1>

            <h2>KANTOR SMK Negeri 1</h2>

            <p>Jl. Mana Saja, Indonesia</p>

            <h2>Kontak kami</h2>

            <p>Jumat , 07.00 WIB - 16.00 WIB SMKN 1</p>

        </div>

    </div>

    <div class="footer text-center">
        <p>© Copyright 2023</p>
    </div>
</body>

</html>
