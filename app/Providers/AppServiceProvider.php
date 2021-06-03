<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $basketGoods = 0;

        View::composer('layouts.sidebar.categories', function (\Illuminate\View\View $view) {
            return $view
                ->with('categories', Category::all());
        });

        View::composer('*', function (\Illuminate\View\View $view) use ($basketGoods) {
            // Using Closure based composers...
            $id = Auth::id();
            if ($id) {
                $currentOrder = Order::getCurrentOrder($id);
                if ($currentOrder) {
                    $basketGoods = sizeof($currentOrder->goods);
                }
            }

            return $view
                ->with('basketGoods', $basketGoods);
        });
    }
}
