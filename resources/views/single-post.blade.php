@include('fe.components.header')

@include('fe.components.navigasi')

<section id="page" style="margin-top: 20vh; margin-bottom: 10vh">
    <div class="container">
        <h2 class="h2">{{$post->title_post}}</h2>
        <hr>
        <img src="{{asset('storage/' . $post->image_post)}}" alt="" style="width: 100%">
        <div>
            {!! $post->content_post !!}
        </div>
        <div>
            Prioritas Berita : {!! $post->priority !!}
        </div>
        <hr>
        <div>
            <p>Publikasi <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->tanggal_post)->format('d M Y') }}</p>
        </div>
    </div>
</section>


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
