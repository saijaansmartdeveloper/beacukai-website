@include('fe.components.header')

@include('fe.components.navigasi')

<img src="{{asset('storage/' . $image_post)}}" alt="" style="width: 100%; margin-top: 11.6vh" class="jumbotron-fluid" />

<div class="container" style="margin-top: 80px">
    <div class="head-title">
        <h3>{!! $title_post !!}</h3>
        <hr>
    </div>
    <div class="body-title">
        {!! $content_post !!}
        <hr>
    </div>
    <div class="footer-title">
        <div class="col-12">
            <p>Tanggal {!! $created_at !!}</p>
        </div>
    </div>
</div>


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
                                            <h4 class="h4" style="margin-top: 0px; padding-top: 30px">{{$item->title_link}}</h4>
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

@include('fe.components.footer')
