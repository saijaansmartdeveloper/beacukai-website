<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\Kurs;
use App\Models\Page;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Siring;
use App\Models\Social;
use App\Models\Survey;
use App\Models\Layanan;
use App\Models\Testimoni;
use App\Models\KotabaruLink;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function isGuest ()
    {
        $data = [
            'banners'       => Banner::orderBy('priority_banner', 'asc')->where('is_active_banner', '1')->get() ?? [],
            'profil'        => Page::where('name_page', 'TENTANG BC KOTABARU')->first() ?? [],
            'siring'        => Siring::orderBy('is_priority', 'asc')->get() ?? [],
            'layanan'       => Layanan::get() ?? [],
            'kurs'          => Kurs::get(),
            'survey'        => Survey::where('is_active_survey', 1)->first(),
            'media'         => KotabaruLink::get() ?? [],
            'testimonis'    => Testimoni::get() ?? [],
            'posts'         => Post::orderBy('tanggal_post', 'desc')->where('priority', 'Berita Terkini')->get(),
            'socials'       => Social::get() ?? [],
            'footer'        => Footer::where('nama_instansi', 'BCKotabaru')->first(),
        ];

        return view('welcome', $data);
    }

    public function single_page($slug)
    {
        $data = [
            'socials'       => Social::get() ?? [],
            'footer'        => Footer::where('nama_instansi', 'BCKotabaru')->first(),
            'page'          => Page::where('slug', $slug)->firstOrFail()
        ];

        return view('single-page', $data);
    }

    public function single_post($slug)
    {
        $data = [
            'socials'       => Social::get() ?? [],
            'footer'        => Footer::where('nama_instansi', 'BCKotabaru')->first(),
            'post'          => Post::where('slug', $slug)->firstOrFail()
        ];

        return view('single-post', $data);
    }

    public function list_post()
    {
        $data = [
            'socials'       => Social::get() ?? [],
            'footer'        => Footer::where('nama_instansi', 'BCKotabaru')->first(),
            'posts'         => Post::orderBy('tanggal_post', 'desc')->get(),
        ];

        return view('posts.list', $data);
    }

    public function peraturan (Request $request, $q = null)
    {

        $search = $request->type ?? 'tentang_peraturan';
        $directoryQuery = Directory::query();
        $directoryQuery->where($search, 'like', '%'.$request->get('q').'%');
        $directoryQuery->orderBy('jenis_peraturan');
        $peraturan = $directoryQuery->paginate(25);

        $data = [
            'banners'       => Banner::orderBy('priority_banner', 'asc')->where('is_active_banner', '1')->get() ?? [],
            'profil'        => Page::where('name_page', 'TENTANG BC KOTABARU')->first() ?? [],
            'siring'        => Siring::orderBy('is_priority', 'asc')->get() ?? [],
            'layanan'       => Layanan::get() ?? [],
            'kurs'          => Kurs::orderBy('id', 'asc')->get() ?? [],
            'survey'        => Survey::where('is_active_survey', 1)->first(),
            'media'         => KotabaruLink::get() ?? [],
            'testimonis'    => Testimoni::get() ?? [],
            'posts'         => Post::orderBy('created_at', 'desc')->where('priority', 'Berita Terkini')->get(),
            'footer'        => [],
            'peraturan'     => $peraturan
        ];

        return view('peraturan', $data);
    }
}
