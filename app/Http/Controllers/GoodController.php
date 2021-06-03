<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Category;

class GoodController extends Controller
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

    public function good(int $id)
    {
        $good = Good::query()->with('category')->find($id);
        return view('good', ['good' => $good]);
    }

    public function category(int $id)
    {
        $categories = Category::all();
        $currentCategory = Category::find($id);

        $goods = Good::query()->where('category_id', '=', $id)->paginate(6);

        return view('home', [
            'goods' => $goods,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);
    }
}
