<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Good;
use Illuminate\Support\Facades\Auth;

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
        $goods = Good::query();

        return view('home', [
            'goods' => $goods->orderBy('id', 'DESC')->paginate(6),
            ]
        );
    }

    public function news()
    {
        return view('news');
    }

    public function about()
    {
        return view('about');
    }
}
