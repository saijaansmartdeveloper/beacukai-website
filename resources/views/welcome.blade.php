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

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2" style="margin-top: 11.6vh">
      <div id="ensign-nivoslider" class="slides" style="max-height: 86vh">
        @forelse ($banners as $key => $item)
        <img src="{{asset('storage/' . $item->image_banner)}}" alt="" title="#slider-direction-{{++$key}}" style="width: 100%" />
        @empty
            <p class="italic">Banner Not Found</p>
        @endforelse
    </div>

      <!-- direction 1 -->

      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1" style="color: gold;">Direktorat Jenderal Bea dan Cukai</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2" style="color: gold;">KPPBC TMP C Kotabaru</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">Lihat Layanan</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
  @if ($profil != null)
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>{{$profil->name_page ?? ''}}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
                <a href="#">
                    <img src="{{asset('storage/' . $profil->image_page )}}" alt="">
			    </a>
                <ul>
                <li>
                  <i class="fa fa-check"></i> Izin Muat Ekspor
                </li>
                <li>
                  <i class="fa fa-check"></i> Izin Bongkar Impor
                </li>
                <li>
                  <i class="fa fa-check"></i> Izin Timbun Impor
                </li>
                <li>
                  <i class="fa fa-check"></i> Redress Manifes
                </li>
                <li>
                  <i class="fa fa-check"></i> Pemberitahuan Impor Barang (BC 2.0)
                </li>
                <li>
                  <i class="fa fa-check"></i> Pemberitahuan Ekspor Barang (BC 3.0)
                </li>
                <li>
                  <i class="fa fa-check"></i> Impor Angkut Lanjut (BC 1.2)
                </li>
                <li>
                  <i class="fa fa-check"></i> Impor Tujuan Kawasan Berikat (BC 2.3)
                </li>
              </ul>
              <!--<iframe title="YouTube video player" class="youtube-player" type="text/html" src="//www.youtube.com/embed/dIUPQ0G-OpA?controls=0&amp;amp;showinfo=0" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
              <div class="single-well">
                  {!! $profil->content_page ?? '' !!}
              </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->
  @endif

  @if ($siring != null)
    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
                <h2>SIRING</h2>
            </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
                @forelse ($siring as $item)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                    <div class="services-details">
                        <div class="single-services">
                            <a class="services-icon" href="{{ $item->link_siring }}" target="blank">
                                {!! $item->icon_siring !!}
                            </a>
                        <h4>{!! $item->name_siring !!}</h4>
                        <p>
                            {!! $item->description_siring !!}
                        </p>
                        </div>
                    </div>
                    <!-- end about-details -->
                    </div>
                </div>
                @empty

                @endforelse
            <!-- Start Left services -->
            {{-- <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php" target="blank">
                                                <i class="fa fa-truck"></i>
                                            </a>
                    <h4>Izin Muat</h4>
                    <p>
                        Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D).
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="https://bckotabaru.net/e-aplikasi/Izin%20Bongkar/Login%20IB%20Agen.php" target="blank">
                                                <i class="fa fa-stack-overflow"></i>
                                            </a>
                    <h4>Izin Bongkar</h4>
                    <p>
                        Pengajuan Perizinan Bongkar Barang Impor di Luar Kawasan Pabean.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="http://bckotabaru.net/e-aplikasi/Izin%20Timbun/Login%20IT%20Importir.php" target="blank">
                                                <i class="fa fa-database"></i>
                                            </a>
                    <h4>Izin Timbun</h4>
                    <p>
                        Pengajuan Perizinan Timbun Barang Impor di Luar Kawasan Pabean.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="https://bckotabaru.net/e-aplikasi/Ijin%20Redress/Login%20IB%20Agen.php" target="blank">
                                                <i class="fa fa-file-text"></i>
                                            </a>
                    <h4>Reddress Manifes</h4>
                    <p>
                        Pengajuan Reddress Manifes.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <!-- End Left services -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="https://bckotabaru.net/e-aplikasi/Boatzoeking/login_agen.php" target="blank">
                                                <i class="fa fa-ship"></i>
                                            </a>
                    <h4>Boatzoeking</h4>
                    <p>
                        Pengajuan Perizinan Pemeriksaan Sarana Pengangkut.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <!-- End Left services -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="https://bckotabaru.net/e-aplikasi/User%20Pegawai/Login%20Pegawai.php" target="_blank">
                                                <i class="fa fa-user"></i>
                                            </a>
                    <h4>Pegawai</h4>
                    <p>
                        Pelayanan aplikasi SIRING untuk Pegawai.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div> --}}
            </div>
        </div>
        </div>
    </div>
    <!-- End Service area -->
  @endif


<!-- start pricing area -->
  <div id="pricing" class="pricing-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Janji Layanan</h2>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <td></td>
                        <th>Pelayanan</th>
                        <th>Waktu Pelayanan</th>
                        <th>Estimasi Pelayanan</th>
                        <th>Biaya</th>
                    </tr>
                    <tr>
                        <th>Izin Muat</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Izin Bongkar</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Izin Timbun</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Redress</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Izin Muat</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Izin Bongkar</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Ekspor BC 3.0</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Impor BC 2.0</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Angkut Lanjut BC 1.2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Impor ke Kaber BC 2.3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Janji Layanan</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list active"  >
            <span class="saleon">Full Day</span>
            <h3>Izin Muat</h3>
            <ol style="background-color: lightcyan;">
              <li class="check">Sistem Online</li>
              <li class="check">Pelayanan 24 x 7</li>
              <li class="check">Max. 6 (Enam) Jam</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list active" >
            <span class="saleon">Full Day</span>
            <h3>Izin Bongkar</h3>
            <ol style="background-color: lightcyan;">
              <li class="check">Sistem Online</li>
              <li class="check">Pelayanan 24 x 7</li>
              <li class="check">Max. 6 (Enam) Jam</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list active" >
            <span class="saleon">Full Day</span>
            <h3>Izin Timbun</h3>
            <ol style="background-color: lightcyan;">
              <li class="check">Sistem Online</li>
              <li class="check">Pelayanan 24 x 7</li>
              <li class="check">Max. 6 (Enam) Jam</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list" >
            <h3>Redress</h3>
            <ol style="background-color: lightcyan;">
              <li class="check">Sistem Online</li>
              <li class="check">Senin-Jumat (07.30-17.00)</li>
              <li class="check">Max. 1 (Satu) Hari Kerja</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>
          </div>
        </div>
      </div>
      <p></p>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list active">
            <span class="saleon">Full Day</span>
            <h3>Ekspor<br/> <span>BC 3.0</span></h3>
            <ol style="background-color: lemonchiffon;">
              <li class="check">Sistem Online</li>
              <li class="check">Pelayanan 24 x 7</li>
              <li class="check">Max. 20 (Dua Puluh) Menit</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list">
            <h3>Impor <br/> <span>BC 2.0</span></h3>
            <ol style="background-color: lemonchiffon;">
              <li class="check">Sistem Online</li>
              <li class="check">Senin-Jumat (07.30-17.00)</li>
              <li class="check">Max. 30 (Dua Puluh) Menit</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list active">
            <span class="saleon">Full Day</span>
            <h3>Angkut Lanjut <br/> <span>BC 1.2</span></h3>
            <ol style="background-color: lemonchiffon;">
              <li class="check">Sistem Online</li>
              <li class="check">Pelayanan 24 x 7</li>
              <li class="check">Max. 30 (Dua Puluh) Menit</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="pri_table_list">
            <h3>Impor ke Kaber <br/> <span>BC 2.3</span></h3>
            <ol style="background-color: lemonchiffon;">
              <li class="check">Sistem Online</li>
              <li class="check">Senin-Jumat (07.30-17.00)</li>
              <li class="check">Max. 60 (Dua Puluh) Menit</li>
              <li class="check"><strong>GRATIS</strong></li>
            </ol>

          </div>
        </div>
      </div>
    </div> --}}
  </div>
  <!-- End pricing table area -->

  @if (@$survey)
<!-- Start team Area -->
<div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="section-headline text-center">
            <h2>Hasil Survey</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <div class="col-xs-12">
            <div class="single-team-member">
              <div>
                <img src="{{ asset('storage/' . $survey->file_survey ?? '') }}" alt="" style="width: 100%">
              </div>
              <div class="team-content text-center">
                <h4>{{$survey->name_survey ?? ''}}</h4>
                <!--<p>Seo</p>-->
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->
  @endif

  <!-- Faq area start -->
  <div id="portofolio" class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Tugas Kami</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="faq-details">
            <div class="panel-group" id="accordion">
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                        <span class="fa fa-check"></span>Industrial Assistance
                    </a>
				  </h4>
                </div>
                <div id="check1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>
                      Mampu memberikan dukungan kepada industri dalam negeri dalam rangka Melindungi industri dalam negeri dari masuknya barang-barang secara ilegal, Membantu meningkatkan daya saing industri dalam negeri, dan Mendukung peningkatan daya saing produk ekspor
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                            <span class="fa fa-check"></span> Community Protector.
                        </a>
					</h4>
                </div>
                <div id="check2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Sebagai aparatur pengawasan lalu lintas barang dalam rangka melindungi kepentingan masyarakat melalui upaya-upaya yaitu Pencegahan thd masuknya barang-barang yang membahayakan keamanan negara, Pencegahan barang-barang yang merusak kesehatan dan meresahkan masyarakat, dan Perlindungan masyarakat thd masuknya barang yang tidak memenuhi standar.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                            <span class="fa fa-check"></span> Trade Facilitator.
                        </a>
					</h4>
                </div>
                <div id="check3" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <p>
                      Memberikan fasilitas perdagangan melalui berbagai upaya strategis, dengan tujuan untuk Meningkatkan kelancaran arus barang dan perdagangan, Menekan ekonomi biaya tinggi, Menciptakan iklim perdagangan yang kondusif, dan Mencegah terjadinya perdagangan ilegal
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                            <span class="fa fa-check"></span></span>Revenue Collector
                        </a>
                    </h4>
                </div>
                <div id="check4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Memungut penerimaan negara dalam rangka Mengoptimalkan penerimaan negara melalui penerimaan Bea Masuk, Bea Keluar, Pajak Dalam Rangka Impor (PDRI), Cukai, dan PPH hasil Tembakau dan Mencegah terjadinya kebocoran penerimaan Negara
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="tab-menu">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active">
                <a href="#p-view-1" role="tab" data-toggle="tab">Pengawasan</a>
              </li>
              <li>
                <a href="#p-view-2" role="tab" data-toggle="tab">Pelayanan</a>
              </li>
              <li>
                <a href="#p-view-3" role="tab" data-toggle="tab">Konsultasi</a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="p-view-1">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Pengawasan</h4>
                  <p>
                    Wilayah pengawasan Bea dan Cukai Kotabaru meliputi Kab. Kotabaru dan Kab. Tanah Bumbu. Kegiatan pengawasan meliputi Patroli Laut, Patroli Darat dan Operasi Pasar.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-2">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Pelayanan</h4>
                  <p>
                    Bea dan Cukai Kotabaru melayani kegiatan Ekspor dan Impor serta Cukai. Waktu Pelayanan Ekspor setiap hari selama 24 jam. Waktu Pelayanan Impor dan Cukai setiap hari kerja pukul 07.30 - 17.00 WITA.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-3">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Konsultasi</h4>
                  <p>
                    Pelayanan konsultasi di bidang kepabeanan dan cukai bagi pengguna jasa.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end Row -->
    </div>
  </div>
  <!-- End Faq Area -->

  <!-- Start reviews Area -->
  <div class="reviews-area hidden-xs">
    <div class="work-us">
      <div class="work-left-text">
        <a href="#">
		    <img src="{{asset('img/komunitas.jpg')}}" alt="">
		</a>
      </div>
      <div class="work-right-text text-center">
        <h2>BC Kotabaru Bersama Komunitas</h2>
        <h5>Momen epik hasil kerjasama banyak pihak seperti ini telah menghasilkan banyak manfaat positif yang didapat</h5>
        <a href="#contact" class="ready-btn">Kontak Kami</a>
      </div>
    </div>
  </div>
  <!-- End reviews Area -->
<!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>BC Kotabaru Link</h2>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="awesome-project-content">
            @forelse ($media as $item)
            <div class="col-md-4 col-sm-4 col-xs-12 photo">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="{{ asset('storage/' . $item->image_link) }}" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a href='{{$item->external_link}}' target="_blank">
                        <!--<a class="venobox" data-gall="myGallery" href="img/portfolio/insw.png">-->
                          <h4>{{$item->title_link}}</h4>
                          <span>{{$item->description_link}}</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty

            @endforelse
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->

  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
                <a class="quate" href="#">
                  <i class="fa fa-quote-right"></i>
                </a>
                <!-- start testimonial carousel -->
                <div class="testimonial-carousel">
                    <!-- End single item -->
                    @foreach ($testimonis as $item)
                    <div class="single-testi">
                        <div class="testi-text">
                            <p>
                                {{$item->testimoni}}
                            </p>
                            <h6>{{$item->name_testimoni}}</h6>
                            <p>{{$item->company_testimoni}}</p>
                        </div>
                    </div>
                    <!-- End single item -->
                    @endforeach
                </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->

  <!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Berita Terkini</h2>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach ($posts as $item)
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-blog">
                    <div class="single-blog-img">
                        <a href="bckotabaru/comingsoon">
                            <img src="{{asset('storage/' . $item->image_post)}}" alt="">
                        </a>
                    </div>
                    <div class="blog-meta">
                        {{-- <span class="comments-type">
                            <i class="fa fa-comment-o"></i>
                            <a href="#">13 comments</a>
                        </span> --}}
                        <span class="date-type">
                            <i class="fa fa-calendar"></i> {{$item->created_at->format('Y m d / h:i:s')}}
                        </span>
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="{{url('post/' . $item->slug)}}">{{$item->title_post}}</a>
                        </h4>
                        <p style="text-align: justify;">
                            {{ substr($item->content_post, 1, 200) }} ...
                        </p>
                    </div>
                    <span>
                        <a href="{{url('post/' . $item->slug)}}" class="ready-btn">Read more</a>
                    </span>
                </div>
                <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Welcome to Bea Cukai Kotabaru</h3>
            <a class="sus-btn" href="#">Kontak Kami</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Kontak Kami</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Telpon: 0812-5825-7525<br>
                  <span>Buka 24 Jam</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: kpbc_kotabaru@yahoo.com<br>
                  <span>Web: www.bckotabaru.net</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Alamat: Jl. Pangeran Kesuma Negara 12 B<br>
                  <span>Kotabaru, Kalimantan Selatan 72111</span>
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>BC</span>Kotabaru</h2>
                </div>

                <p style="text-align: justify;">Kantor Pengawasan dan Pelayanan Bea dan Cukai Tipe Madya Pabean C Kotabaru berada di bawah Kantor Wilayah DJBC Kalimantan Bagian Selatan, merupakan salah satu unit kerja vertikal di bawah Direktorat Jenderal Bea dan Cukai pada Kementerian Keuangan Republik Indonesia.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="https://id-id.facebook.com/pages/category/Government-Organization/Bea-Cukai-Kotabaru-1436837939680697/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://twitter.com/bckotabaru?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/channel/UCfLGTQ6CEgLIa1DstHfLAzA" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/beacukai.kotabaru/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Informasi</h4>
                <div class="footer-contacts">
                  <p><span>Tel:</span> 0812-5825-7525</p>
                  <p><span>Email:</span> kpbc_kotabaru@yahoo.com</p>
                  <p><span>Jam Kerja:</span> 24 Jam</p>
                </div>
                <h4>Jumlah Pengunjung</h4>
                <div class="footer-contacts"><script type="text/javascript" src="http://services.webestools.com/cpt_visitors/64272-1-9.js"></script></div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Peta Lokasi</h4>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4624998824697!2d116.22745961414053!3d-3.2344805976450886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2def31e82351e6d3%3A0x5f863fc0fa076e24!2sKANTOR%20BEA%20CUKAI%20KOTABARU!5e0!3m2!1sid!2sid!4v1574393905911!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                Created @2019 by <strong> Yo</strong> || KPPBC TMP C Kotabaru
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </footer>

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
