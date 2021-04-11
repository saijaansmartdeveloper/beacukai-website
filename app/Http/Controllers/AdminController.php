<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Siring;
use App\Models\Survey;
use App\Models\Testimoni;
use App\Models\KotabaruLink;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function isGuest ()
    {
        $data = [
            'banners'   => Banner::orderBy('priority_banner', 'asc')->where('is_active_banner', '1')->get() ?? [],
            'profil'    => Page::where('name_page', 'TENTANG BC KOTABARU')->first() ?? [],
            'siring'    => Siring::orderBy('is_priority', 'asc')->get() ?? [],
            'survey'    => Survey::where('is_active_survey', 1)->first(),
            'media'     => KotabaruLink::get() ?? [],
            'testimonis' => Testimoni::get() ?? [],
            'posts'     => Post::orderBy('created_at', 'desc')->take(3)->get()
        ];

        return view('welcome', $data);
    }
}
