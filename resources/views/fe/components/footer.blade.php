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
