@include('fe.components.header')

@include('fe.components.navigasi')

<!-- Start Blog Area -->
<div id="blog" class="blog-area" style="margin-top: 20vh; margin-bottom: 10vh">
    <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Berita</h2>
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


        </div>
    </div>
</div>
<!-- End Blog -->

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
