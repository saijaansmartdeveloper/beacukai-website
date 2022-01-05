@include('fe.components.header')

@include('fe.components.navigasi')

<section id="page" style="margin-top: 20vh; margin-bottom: 10vh">
    <div class="container">
        <h2 class="h2">Direktori Peraturan</h2>
        <hr>
        <div>
            <form method="GET" action="" accept-charset="UTF-8">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="q">
                    </div>
                    <div class="col-md-4">
                        <select name="type" id="type" class="form-control mx-sm-2"><option value="jenis_peraturan">Jenis Peraturan</option><option value="tentang_peraturan">Tentang Peraturan</option><option value="nomor_peraturan">No Peraturan</option></select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="{{ __('directory.search') }}" class="btn btn-secondary">
                    </div>
                </div>
            </form>
        </div>

        <div style="padding-top: 24px;">
            <table class="table table-hover table-striped">
                <tr>
                    <th class="text-center">No</th>
                    <th>Jenis Peraturan</th>
                    <th>Tentang Peraturan</th>
                    <th class="text-center">Link</th>
                </tr>
                @forelse ($peraturan as $key => $item)
                <tr>
                    <td style="width: 5%" class="text-center">{!! ++$key !!}</td>
                    <td style="width: 25%">{{ $item->jenis_peraturan }}</td>
                    <td>
                        <p><strong>{{ $item->nomor_peraturan }}</strong></p>
                        <p>{{ $item->tentang_peraturan }}</p>
                    </td>
                    <td style="width: 5%" class="text-center">
                        <a href="{{ url('uploads/' . $item->file_peraturan) }}" target="_blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><i>Peraturan tidak ditemukan</i></td>
                </tr>
                @endforelse
            </table>
                {{-- <table class="table table-hover table-striped">
                    <tr>
                        <th class="bg-primary" colspan="2">{{ Str::upper($item->jenis_peraturan) }}</th>
                    </tr>
                    <tr>
                        <td>{{ Str::upper($item->nomor_peraturan) }}</td>
                        <td rowspan="2" class="text-middle">
a
                        </td>
                    </tr>
                    <tr>
                        <td>{{ Str::upper($item->tentang_peraturan) }}</td>
                    </tr>
                </table> --}}
                {{-- @endforeach --}}
        </div>

        {{-- <div style="padding-top: 24px;">
            @foreach ($peraturan as $item)
                {{-- <div class="">
                    <h3 class="h4"><strong>{{ Str::upper($item->jenis_peraturan) }}</strong></h3>
                    <p><strong>{{$item->nomor_peraturan}}</strong> {{$item->tentang_peraturan}}</p>
                    <a href="$" class="float-right">Link</a>
                </div>
                <hr> --}}
            {{-- @endforeach --}}
        {{-- ?</div> --}}
    </div>
</section>

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

@include('fe.components.footer')
