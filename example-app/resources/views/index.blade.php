<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponsonbys Care - Home</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icons">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>

    <!-- Pop-up Welcome -->
<div id="welcome-popup" class="welcome-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>Selamat Datang di Ponsonbys Care!</h2>
        <p>Kami senang Anda berada di sini. Nikmati pengalaman menjelajahi layanan kesehatan kami!</p>
    </div>
</div>

    <!--Pop up Welcome end -->


    <!-- tampilan awal-->

    <section class="background">
        <nav class="navbar">
            <a href="#" class="logo"><img src="img/favicon.ico" alt=""></a>
            <div class="navbar-items h-class">
                <ul class="nav v-class">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#blog">BLOG</a></li>
                </ul>
            </div>
            <div class="burger">&#9776</div>
        </nav>
        <div class="main">
            <div class="text-box">
                <h1>We are committed to supporting your health</h1>
                <a href="#services" class="btn btn1">visit to know more</a>
            </div>
        </div>
    </section>

    <!--Tampilan awal end-->

    <!-- ____________services -->
    <section id="services" class="services">
        <h1 class="heading">What do you know about..</h1>
        <div class="swiper services-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box1">
                    <a href="dentistry" class="full-box-link">
                        <h2>Dentistry</h2>
                        <p>Apa itu kesehatan Gigi?</p>
                    </a>
                </div>
                <div class="swiper-slide box1">
                    <a href="ophthalmology" class="full-box-link">
                        <h2>Ophthalmology</h2>
                        <p>Apa itu kesehatan Mata?</p>
                    </a>
                </div>
                <div class="swiper-slide box1">
                    <a href="cancer" class="full-box-link">
                        <h2>Cancer</h2>
                        <p>Apa itu Cancer / kanker?</p>
                    </a>
                </div>
                <div class="swiper-slide box1">
                    <a href="cardiology" class="full-box-link">
                        <h2>Cardiology</h2>
                        <p>Apa itu kesehatan jantung?</p>
                    </a>
                </div>
                <div class="swiper-slide box1">
                    <a href="neurology" class="full-box-link">
                        <h2>Neurology</h2>
                        <p>Apa itu kesehatan saraf?</p>
                    </a>
                </div>
                <div class="swiper-slide box1">
                    <a href="dermatology" class="full-box-link">
                        <h2>Dermatology</h2>
                        <p>Apa itu kesehatan kulit?</p>
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- ____________quality  -->
    <section class="quality">
        <h1 class="heading">why choose our healthcare website   ?</h1>
        <div class="row">
            <div class="box2">
                <h2>24/7 available</h2>
                <p>Kami siap menerima keluhan tentang penyakit yang di rasakan oleh pembaca secara gratis</p>
            </div>
            <div class="box2">
                <h2>medical cycle care</h2>
                <p>Kami siap merekomendasikan obat atau rumah sakit untuk berobat yang sesuai dengan penyakit yang di diagnosa</p>
            </div>
            <div class="box2">
                <h2>quality control</h2>
                <p>Kami siap memberikan tim pelayanan quality control yang dapat diisi di booking appointment diatas</p>
            </div>
        </div>
    </section>

    <!-- _______________about -->
    <section id="blog" class="about">
        <h1 class="heading">Latest Blog Posts</h1>
        <div class="blog-container">
            <div class="blog-box">
                <div class="img-container">
                    <img src="img/blog1-healthy-food.jpg" alt="Blog Image 1">
                </div>
                <div class="blog-content">
                    <h2>Blog Post 1</h2>
                    <p>10 Makanan Sehat untuk Hidup Lebih Panjang dan Berkualitas.</p>
                </div>
            </div>
            <div class="blog-box">
                <div class="img-container">
                    <img src="img/blog2-manfaat-olahraga.jpg" alt="Blog Image 2">
                </div>
                <div class="blog-content">
                    <h2>Blog Post 2</h2>
                    <p>Manfaat Olahraga Teratur untuk Kesehatan Fisik dan Mental.</p>
                </div>
            </div>
            <div class="blog-box">
                <div class="img-container">
                    <img src="img/blog3-jantung.jpg" alt="Blog Image 3">
                </div>
                <div class="blog-content">
                    <h2>Blog Post 3</h2>
                    <p>Jenis Buah untuk Kesehatan Jantung yang Baik Dikonsumsi Rutin.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- _______________footer -->
    <footer>
        <div class="footer-sec">
            <div class="sec">
                <div class="f_box">
                    <h2>contact</h2>
                    <p>email</p>
                    <p>youtube</p>
                    <p>facebook</p>
                    <p>twitter</p>
                </div>
                <div class="f_box">
                    <h2>departments</h2>
                    <p>radiology</p>
                    <p>pharmocology</p>
                    <p>pathology</p>
                    <p>anatomy</p>
                </div>
            </div>

            <div class="sec">
                <div class="f_box">
                    <h2>address</h2>
                    <p>Central Jakarta,<br> Sudirman</p>
                    <p>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-snapchat"></i>
                        <i class="fab fa-whatsapp"></i>
                    </p>
                </div>
                <div class="f_box">
                    <h2>other facilities</h2>
                    <p>24/7 services</p>
                    <p>quality control</p>
                    <p>full cycle medical care</p>
                </div>
            </div>
        </div>
        <p class="para">copyright @ Nicolas Matthew Wijaya, William Immanuel Lee, Fawaz</p>
    </footer>
    <script src="/js/index.js"></script>

</body>
</html>
