<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KUSUMA_ILM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets-frontend/img/logo.png') }}" rel="icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('assets-frontend/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets-frontend/css/style.css') }}" rel="stylesheet">
    <style>
        html {
            scroll-padding-top: 170px;
        }
    </style>
</head>

<body>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="index.html" class="logo"><img src="{{ asset('assets-frontend/img/logo.jpg') }}" alt=""
                    class="img-fluid" style="margin-right: 10px;margin-top: -10px;"></a>
            <h1 class="logo me-auto"><a href="#">Kusuma_ILM</a></h1>
            <nav id=" navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            @auth
            <a href="{{ route('login') }}" class="get-started-btn">Home</a>
            @else
            <a href="{{ route('login') }}" class="get-started-btn">Login</a>

            @endauth

        </div>
    </header>

    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Pengajaran menarik dan<br>unik bagi pelajar untuk belajar</h1>
            <h2>Kusuma merupakan salah satu tempat bimbingan belajar terbaik di Tanjungpinang</h2>
            <a href="#contact" class="btn-get-started">Get Started</a>
        </div>
    </section>

    <main id="main">


        <section id="counts" class="counts section-bg">
            <div class="container">

                {{-- <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Students</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Courses</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Events</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Trainers</p>
                    </div>

                </div> --}}
                <div class="col-lg-12">
                    <h2 class="text-center font-weight-bold">More info about us! Check on our <a
                            href="https://www.instagram.com/kusuma.ilm/" target="_blank">Instagram</a>
                    </h2>
                </div>

            </div>
        </section>

        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Kenapa harus KUSUMA ?</h3>
                            <p style="text-align: justify;word-spacing: -2px;">
                                Para pelajar dapat belajar tanpa rasa bosan karena kami menyediakan mentor yang menarik
                                dan berpengalaman, serta kami menyediakan fasilitas yang nyaman untuk ruang lingkup
                                belajar dengan harga yang terjangkau.
                                Mari, bergabunglah bersama kami di KUSUMA.
                            </p>
                            <div class="text-center">
                                <a href="https://www.instagram.com/kusuma.ilm/" target="_blank" class="more-btn">Learn
                                    More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxs-school'></i>

                                        <p>KUSUMA merupakan pusat bimbel terbaik diseluruh tanjungpinang
                                            dengan
                                            pengajaran belajar yang unik dan menarik</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxs-calendar'></i>
                                        <p>Kami menyediakan banyak kelas perharinya dengan "hari belajar" mulai dari
                                            hari senin - sabtu</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxs-time'></i>
                                        <p>Jam operasional kami mulai dari jam 16.00 WIB - 20.30 WIB setiap "hari
                                            belajar"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Contact Us</h2>
            </div>
        </div>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jalan Potong Lembu No.1 Tanjungpinang, 29122</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+628 127 072 452</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <div data-aos="fade-up">
                            <iframe style="border:0; width: 100%; height: 350px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2952615364643!2d104.4501813!3d0.9277715999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d973ab5481979d%3A0x97c4b55e329e0c0d!2sKUSUMA_ILM!5e0!3m2!1sid!2sid!4v1644481921569!5m2!1sid!2sid"
                                frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </main>

    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Kusuma</span></strong>. All Rights Reserved
                </div>

            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="https://www.youtube.com/channel/UC4Bm_gqCne6OwKoleh42hCA" target="_blank" class="youtube"><i
                        class="bx bxl-youtube"></i></a>
                <a href="https://www.instagram.com/kusuma.ilm/" target="_blank" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('assets-frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('assets-frontend/vendor/php-email-form/validate.js') }}">
    </script>
    <script src="{{ asset('assets-frontend/vendor/purecounter/purecounter.js') }}">
    </script>
    <script src="{{ asset('assets-frontend/vendor/swiper/swiper-bundle.min.js') }}">
    </script>

    <script src="{{ asset('assets-frontend/js/main.js') }}"></script>

</body>

</html>