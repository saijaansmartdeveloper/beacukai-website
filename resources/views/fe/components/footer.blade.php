
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
                            Copyright KPPBC TMP C Kotabaru
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
<script src="{{asset('fe/lib/owl-carousel/owl.carousel.min.js')}}"></script>
{{-- <script src="{{asset('fe/lib/owlcaraousel/owl.caraousel.min.js')}}"></script> --}}
<script src="{{asset('fe/lib/venobox/venobox.min.js')}}"></script>
<script src="{{asset('fe/lib/knob/jquery.knob.js')}}"></script>
<script src="{{asset('fe/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('fe/lib/parallax/parallax.js')}}"></script>
<script src="{{asset('fe/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('fe/lib/nivo-slider/js/nivo-slider.js')}}" type="text/javascript"></script>
<script src="{{asset('fe/lib/appear/jquery.appear.js')}}"></script>
<script src="{{asset('fe/lib/isotope/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('fe/js/main.js')}}"></script>

<script>
$(document).ready(function() {

    $("#owl-big-banner").owlCarousel({
        navigation : true, // Show next and prev buttons
        loop : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        stoponhover : true,
        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,

        autoplay: true,
   });

   $("#testimonial-carousel").owlCarousel({
        loop : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        stoponhover : true,
        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,

        autoplay: true,
   });

});
</script>

</body>

</html>
