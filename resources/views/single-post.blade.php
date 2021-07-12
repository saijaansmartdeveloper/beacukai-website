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


@include('fe.components.footer')
