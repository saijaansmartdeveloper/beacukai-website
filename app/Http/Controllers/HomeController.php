<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\Layanan;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'layanan' => Layanan::all()->count(),
            'peraturan' => Directory::all()->count(),
            'berita' => Post::all()->count(),
            'direktori' => Directory::orderBy('created_at')->take(10),
            'terbaru' => Post::orderBy('created_at')->take(10),
        ];

        return view('home', $data);
    }

}
