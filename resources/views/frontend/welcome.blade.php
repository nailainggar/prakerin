<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Creative - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Tracking Covid</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#provinsi">Data Kasus Lokal</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#global">Data Kasus Global</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->

    <!-- About-->
    <section class="page-section bg-primary" id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Corona Virus</h2>
                    <hr class="divider light my-4" />
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0"></h2>
            <hr class="divider my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-plus text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Positif</h3>
                        <p class="text-muted mb-0">{{ number_format($positif) }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-smile -4x text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Sembuh</h3>
                        <p class="text-muted mb-0">{{ number_format($sembuh) }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-skull text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Meninggal</h3>
                        <p class="text-muted mb-0">{{ number_format($meninggal) }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Data Kasus Positif Dunia</h3>
                        <p class="text-muted mb-0"><?php echo $getglobal['value']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section><br>



    <section id="provinsi" class="provinsi">
        <div class="container">


            <div class="section-title" data-aos="zoom-out">
                <h2>
                    <center>Data Kasus Indonesia Berdasarkan Provinsi</center>
                </h2>
            </div><br><br>

            <div class="row content" data-aos="fade up">

                <div class="table-wrapper-scroll-y my custom-scrollbar col-lg-12">

                    <table class="table table-bordered table-striped mb-0 " width="100%">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Provinsi</center>
                                </th>
                                <th scope="col">
                                    <center>Positif</center>
                                </th>
                                <th scope="col">
                                    <center>Sembuh</center>
                                </th>
                                <th scope="col">
                                    <center>Meninggal</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($front as $data)
                                <tr>
                                    <th scope="row">
                                        <center>{{ $no++ }}</center>
                                    </th>
                                    <td>
                                        <center>{{ $data->nama_provinsi }}</center>
                                    </td>
                                    <td>
                                        <center>{{ number_format($data->positif) }}</center>
                                    </td>
                                    <td>
                                        <center>{{ number_format($data->sembuh) }}</center>
                                    </td>
                                    <td>
                                        <center>{{ number_format($data->meninggal) }}</center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section><br><br><br><br><br><br><br>


    <section id="global" class="global">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>
                    <center>Data Kasus Dunia</center>
                </h2>
            </div><br><br>

            <div class="row content" data-aos="fade-up">

                <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">

                    <table class="table table-bordered table-striped mb-0 " width="100%">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Negara</center>
                                </th>
                                <th scope="col">
                                    <center>Positif</center>
                                </th>
                                <th scope="col">
                                    <center>Sembuh</center>
                                </th>
                                <th scope="col">
                                    <center>Meninggal</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($globall as $data)
                                <tr>
                                    <td> <?php echo $no++; ?></td>
                                    <td> <?php echo $data['attributes']['Country_Region']; ?></td>
                                    <td> <?php echo number_format($data['attributes']['Confirmed']); ?></td>
                                    <td><?php echo number_format($data['attributes']['Recovered']); ?></td>
                                    <td><?php echo number_format($data['attributes']['Deaths']); ?></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        </div>
    </section><br><br><br>
    <!-- ======== End Table Section Global ======= -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <center>
                    <h2>Tentang Covid-19</h2>
                </center><br>
                <p>COVID-19 (coronavirus disease 2019) adalah penyakit yang disebabkan oleh jenis coronavirus baru
                    yaitu Sars-CoV-2, yang dilaporkan pertama kali di Wuhan Tiongkok pada tanggal 31 Desember 2019.
                </p>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p><b>
                            Lindungi diri Anda dan orang lain di sekitar Anda dengan mengetahui fakta-fakta terkait
                            virus ini dan mengambil langkah pencegahan yang sesuai. Ikuti saran yang diberikan oleh
                            otoritas kesehatan setempat, adapun cara untuk mencegah agar terhindar dari virus
                            covid-19
                        </b></p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Cuci tangan Anda secara rutin. Gunakan sabun dan
                            air, atau cairan pembersih tangan berbahan alkohol.</li>
                        <li><i class="ri-check-double-line"></i> Selalu jaga jarak aman dengan orang yang batuk atau
                            bersin</li>
                        <li><i class="ri-check-double-line"></i> Kenakan masker jika pembatasan fisik tidak
                            dimungkinkan.</li>
                        <li><i class="ri-check-double-line"></i> Jangan sentuh mata, hidung, atau mulut Anda.</li>
                        <li><i class="ri-check-double-line"></i> Saat batuk atau bersin, tutup mulut dan hidung Anda
                            dengan lengan atau tisu.</li>
                        <li><i class="ri-check-double-line"></i> Jangan keluar rumah jika merasa tidak enak badan.
                        </li>
                        <li><i class="ri-check-double-line"></i> Jika demam, batuk, atau kesulitan bernapas, segera
                            cari bantuan medis.
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p><b>
                            COVID-19 telah menelan banyak korban jiwa. Sebagai upaya penanggulangan penyebaran,
                            penting
                            sekali bagi kita untuk mengenali gejala infeksi virus Corona, terutama gejala awalnya di
                            minggu pertama.
                        </b></p>
                    <ul>
                        <li><i class="ri-check-double-line"></i>Demam ≥380 C</li>
                        <li><i class="ri-check-double-line"></i> Kelelahan atau lemas</li>
                        <li><i class="ri-check-double-line"></i> Hilangnya kemampuan mengecap rasa atau mencium
                            aroma</li>
                        <li><i class="ri-check-double-line"></i> Sesak Napas.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Kontak</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>
                        <+1>+1 (555) 123-4567</b>
                    </div>
                </div>
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-location-arrow fa-3x mb-3 text-muted"></i>
                    <div>Lokasi: <b>Jl.Soekarno hatta</b></div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:contact@yourwebsite.com"><b>nailainggar25@gmail.com</b></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
