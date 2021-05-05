@include('fe.components.header')

@include('fe.components.navigasi')

<!-- Start Slider Area -->
<div id="home" class="slider-area">
    <div class="bend niceties preview-2" style="margin-top: 9vh">
        <div id="owl-big-banner" class="owl-carousel owl-theme">
            @forelse ($banners as $key => $item)
            <div class="item">
                <div class="text-banner" style="background: #ffffffc0; color: #333333; position: absolute;top: 35%; width: 100%; padding-bottom: 10px;">
                    <h1 class="h1 text-center"><strong>{{ $item->title_banner }}</strong></h1>
                    <h4 class="h4 text-center"><em>{{ $item->description_banner }}</em></h4>
                </div>
                <img src="{{asset('storage/' . $item->image_banner)}}" alt="{{ $item->title_banner }}" />
            </div>
            @empty
            <div class="item">
                <p class="italic">Banner Not Found</p>
            </div>
            @endforelse

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
                                @forelse($layanan as $key => $item)
                                    <li>
                                        <i class="fa fa-check"></i> {!! $item->nama_layanan !!}
                                    </li>
                                @empty

                                @endforelse
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

<!-- Start Service area -->
@if ($siring != null)
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
                    @foreach ($siring as $key => $item)
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Service area -->
@endif


<!-- start pricing area -->
@if($layanan != null)
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
            <div class="col-md-12 table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td></td>
                            <th class="text-center">Pelayanan</th>
                            <th class="text-center">Waktu Pelayanan</th>
                            <th class="text-center">Estimasi Pelayanan</th>
                            <th class="text-center">Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($layanan as $key => $item)
                            <tr>
                                <th>{!! $item->nama_layanan !!}</th>
                                <td class="text-center">{!! $item->jenis_layanan !!}</td>
                                <td class="text-center">{!! $item->waktu_layanan !!}</td>
                                <td class="text-center">{!! $item->estimasi_layanan !!}</td>
                                <td class="text-center">{!! $item->biaya_layanan !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
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
                                <img src="{{ asset('storage/' . $survey->file_survey ?? '') }}" alt=""
                                     style="width: 100%">
                            </div>
                            <div class="team-content text-center">
                                <h4>{{$survey->name_survey ?? ''}}</h4>
                                <p>{{$survey->description_survey ?? ''}}</p>
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

@if (count($kurs) != 0)
    <!-- Start team Area -->
    <div id="kurs" class="faq-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Kurs</h2>
                        <p><i>Periode Berlaku : {{ $kurs->first()->tanggal_berlaku }}</i></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Nama Mata Uang</th>
                            <th class="text-center">Nilai Mata Uang</th>
                            <th class="text-center">Perubahan Mata Uang</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kurs as $key => $item)
                            <tr>
                                <th>{{ ++$key }}</th>
                                <td class="text-left">{!! $item->nama_mata_uang !!}</td>
                                <td class="text-right">{!! $item->nilai !!}</td>
                                <td class="text-center">{!! $item->status_up_down !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                                        Mampu memberikan dukungan kepada industri dalam negeri dalam rangka Melindungi
                                        industri dalam negeri dari masuknya barang-barang secara ilegal, Membantu
                                        meningkatkan daya saing industri dalam negeri, dan Mendukung peningkatan daya
                                        saing produk ekspor
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
                                        Sebagai aparatur pengawasan lalu lintas barang dalam rangka melindungi
                                        kepentingan masyarakat melalui upaya-upaya yaitu Pencegahan thd masuknya
                                        barang-barang yang membahayakan keamanan negara, Pencegahan barang-barang yang
                                        merusak kesehatan dan meresahkan masyarakat, dan Perlindungan masyarakat thd
                                        masuknya barang yang tidak memenuhi standar.
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
                                        Memberikan fasilitas perdagangan melalui berbagai upaya strategis, dengan tujuan
                                        untuk Meningkatkan kelancaran arus barang dan perdagangan, Menekan ekonomi biaya
                                        tinggi, Menciptakan iklim perdagangan yang kondusif, dan Mencegah terjadinya
                                        perdagangan ilegal
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
                                        Memungut penerimaan negara dalam rangka Mengoptimalkan penerimaan negara melalui
                                        penerimaan Bea Masuk, Bea Keluar, Pajak Dalam Rangka Impor (PDRI), Cukai, dan
                                        PPH hasil Tembakau dan Mencegah terjadinya kebocoran penerimaan Negara
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
                                    Wilayah pengawasan Bea dan Cukai Kotabaru meliputi Kab. Kotabaru dan Kab. Tanah
                                    Bumbu. Kegiatan pengawasan meliputi Patroli Laut, Patroli Darat dan Operasi Pasar.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="p-view-2">
                        <div class="tab-inner">
                            <div class="event-content head-team">
                                <h4>Pelayanan</h4>
                                <p>
                                    Bea dan Cukai Kotabaru melayani kegiatan Ekspor dan Impor serta Cukai. Waktu
                                    Pelayanan Ekspor setiap hari selama 24 jam. Waktu Pelayanan Impor dan Cukai setiap
                                    hari kerja pukul 07.30 - 17.00 WITA.
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
                                <a href="#"><img src="{{ asset('storage/' . $item->image_link) }}" alt=""/></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a href='{{$item->external_link}}' target="_blank">
                                            <!--<a class="venobox" data-gall="myGallery" href="img/portfolio/insw.png">-->
                                            <h4 class="h4"
                                                style="margin-top: 0px; padding-top: 30px">{{$item->title_link}}</h4>
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
                        <h1 class="h1" style="color: white;">TESTIMONI</h1>
                        <!-- start testimonial carousel -->
                        <div id="testimonial-carousel" class="owl-carousel owl-theme">
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

            @foreach ($posts->chunk(3) as $items)
                <div class="row" style="margin-bottom: 2rem; padding-top: 2rem; padding-bottom: 2rem;">
                    @foreach ($items as $item)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="{{url('post/' . $item->slug)}}">
                                    <img src="{{asset('storage/' . $item->image_post)}}" alt="" style="max-height: 200px; width: 100%;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($item->tanggal_post)->format('d M Y') }}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="{{url('post/' . $item->slug)}}">{{$item->title_post}}</a>
                                </h4>
                                <p style="text-align: justify;">
                                    {!! Str::limit(strip_tags($item->content_post), 200, '...') !!}
                                </p>
                            </div>
                            <span>
                                <a href="{{url('post/' . $item->slug)}}" class="ready-btn">Read more</a>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach

            @if (count($posts) >= 3)
            <div class="row" style="padding-top: 40px">
                <a href="{{ route('post.list') }}" class="btn btn-block ready-btn" style="color: #333; border-color: #eee;">Lihat Semua Berita</a>
            </div>
            @endif
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
                                Telpon: {!! ($footer->telp_instansi) ?? '' !!}<br>
                                <span>{!! ($footer->jam_kerja_instansi) ?? '' !!}</span>
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
                                Email: {!! ($footer->email_instansi) ?? '' !!}<br>
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
                                Alamat: {!! ($footer->alamat_instansi) ?? '' !!}
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

                            <p style="text-align: justify;">{!! ($footer->deskripsi_instansi) ?? '' !!}</p>
                            <div class="footer-icons">
                                <ul>
                                    @foreach ($socials as $item)
                                    <li>
                                        <a href="{{$item->link_social}}"
                                           target="_blank">{{$item->icon_social ?? $item->title_social}}</a>
                                    </li>
                                    @endforeach
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
                                <p><span>Tel:</span> {!! ($footer->telp_instansi) ?? '' !!}</p>
                                <p><span>Email:</span> {!! ($footer->email_instansi) ?? '' !!}</p>
                                <p><span>Jam Kerja:</span> {!! ($footer->jam_kerja_instansi) ?? '' !!}</p>
                            </div>
                            <h4>Jumlah Pengunjung</h4>
                            <div class="footer-contacts">
                                <script type="text/javascript"
                                        src="http://services.webestools.com/cpt_visitors/64272-1-9.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Peta Lokasi</h4>
                            {!! ($footer->maps_instansi) ?? '' !!}
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
