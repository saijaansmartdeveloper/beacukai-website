@include('fe.components.header')

@include('fe.components.navigasi')

<section id="page" style="margin-top: 20vh; margin-bottom: 10vh">
    <div class="container">
        <h2 class="h2">{{$page->name_page}}</h2>
        <hr>
        <img src="{{asset('storage/' . $page->image_page)}}" alt="" style="width: 100%">
        <div>
            {!! $page->content_page !!}
        </div>
    </div>
</section>

@include('fe.components.footer')
