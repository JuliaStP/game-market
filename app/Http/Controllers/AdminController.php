<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Good;
use App\Http\Requests\GoodRequest;

class AdminController extends Controller
{
    public function orders()
    {
        return view('admin.orders', [
                'orders' => Order::all(),
            ]
        );
    }

    //CATEGORIES

    public function categories() {
        $cats = Category::all();

        return view('admin.categories', [
            'cats' => $cats,
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function add(Request $request)
    {
        $catName = $request->get('title');


        $cat = Category::query()->where('title', '=', $catName)->first();

        if(isset($cat)) {
            echo 'This category already exists';
            exit();
        } else {
            $cat = Category::create([
                'title' => $request->get('title'),
                'desc' => $request->get('desc')
            ]);

            $cat->save();

            return redirect()->route('admin.categories');
        }
    }

    public function edit($id)
    {
        $cat = Category::query()->find($id);

        return view('admin.edit', [
            'cat' => $cat,
        ]);
    }

    public function save(Request $request)
    {
        $cat = Category::query()->find($request->id);

        $cat->title = $request->title;
        $cat->desc = $request->desc;
        $cat->save();

        return redirect()->route('admin.categories');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('admin.categories');
    }

    //GOODS

    public function goods() {
        $goods = Good::all();

        return view('admin.goods', [
            'goods' => $goods,
        ]);
    }

    public function createpro()
    {
        return view('admin.createpro');
    }

    public function addpro(Request $request)
    {
        $catName = $request->get('category');

        $cat = Category::query()->where('title', '=', $catName)->first();

        if(isset($cat)) {
            $good = Good::create([
                'category_id' => $cat->id,
                'title' => $request->get('title'),
                'price' => $request->get('price'),
                'desc' => $request->get('desc')
            ]);

            $good->save();

            return redirect()->route('admin.goods');
        } else {
            echo 'This category does not exist';
            exit();
        }
    }

    public function editpro($id)
    {
        $good = Good::query()->find($id);
        $cat = Category::query()->find($good->category_id);

        return view('admin.editpro', [
            'good' => $good,
            'category' => $cat['title'],
        ]);
    }

    public function savepro(Request $request)
    {
        $good = Good::query()->find($request->id);

        $cat = Category::query()->where('title', '=', $request->category)->first();

        if (isset($cat->id)) {
            $good->title = $request->title;
            $good->price = $request->price;
            $good->desc = $request->desc;
            $good->category_id = $cat->id;
            $good->save();

            return redirect()->route('admin.goods');
        } else {
            echo 'This category does not exist';
        }
    }

    public function deletepro(Request $request)
    {
        Good::destroy($request->id);
        return redirect()->route('admin.goods');
    }
}
