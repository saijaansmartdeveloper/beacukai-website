<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bea Cukai Kotabaru</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="bckotabaru/img/favicon.png" rel="icon">
  <link href="bckotabaru/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('fe/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('fe/lib/nivo-slider/css/nivo-slider.min.css')}}" rel="stylesheet">
  <link href="{{asset('fe/lib/owlcaraousel/owl.caraousel.css')}}" rel="stylesheet">
  <link href="{{asset('fe/lib/owlcaraousel/owl.transitions.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('fe/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('fe/lib/venobox/venobox.css')}}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{asset('fe/css/nivo-slider-theme.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('fe/css/style.css')}}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{asset('fe/css/responsive.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>BC</span>Kotabaru</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">HOME</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">PROFIL</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">SIRING</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#pricing">PELAYANAN</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="https://drive.google.com/drive/folders/1IcGJczgNNqRUMSIxyGo2AUNHwibDMqfg" target="_blank">PERATURAN</a>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">TENTANG KAMI<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#portofolio" class="page-scroll" >TUGAS KAMI</a></li>
                      <li><a href=bckotabaru/comingsoon >GALERI</a></li>
                      <li><a class="page-scroll" href="#team" >HASIL SURVEY</a></li>
                      <li><a href=bckotabaru/comingsoon >ALUR PROSES BISNIS</a></li>
                    </ul>
                  </li>

                  <li>
                    <a class="page-scroll" href="#blog">BERITA</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">KONTAK</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="http://bckotabaru.net/forum/" target="_blank">FORUM</a>
                  </li>
                </ul>

              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <div id="home" class="slider-area">
    <img src="{{asset('storage/' . $image_post)}}" alt="" style="width: 100%; margin-top: 11.6vh" />

    <div class="container">
        tes
    </div>
  </div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('fe/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('fe/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('fe/lib/owlcaraousel/owl.caraousel.min.js')}}"></script>
  <script src="{{asset('fe/lib/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('fe/lib/knob/jquery.knob.js')}}"></script>
  <script src="{{asset('fe/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('fe/lib/parallax/parallax.js')}}"></script>
  <script src="{{asset('fe/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('fe/lib/nivo-slider/js/nivo-slider.js')}}" type="text/javascript"></script>
  <script src="{{asset('fe/lib/appear/jquery.appear.js')}}"></script>
  <script src="{{asset('fe/lib/isotope/isotope.pkgd.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{asset('fe/contactform/contactform.js')}}"></script>

  <script src="{{asset('fe/js/main.js')}}"></script>
  <script>
      /*---------------------
     Testimonial carousel
    ---------------------*/

    var test_carousel = $('.testimonial-carousel');
    test_carousel.owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      autoplay: true,
      responsive: {

        0 : {
            items : 1
        },

      }
    });
  </script>

</body>

</html>
