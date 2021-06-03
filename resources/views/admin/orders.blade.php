@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="content-head__title-wrap__title bcg-title" >All orders from all users</div>

                    <div class=content-top__text>

                        <table class="table table-bordered">
                            @foreach($orders as $order)
                                <tr style="font-family: PT_Sans">
                                    <td>order id: {{$order->id}} </td>
                                    <td>order state: {{$order->state}}</td>
                                </tr>
                            @endforeach
                        </table> <br><br><br>
                        <div class="content-head__title-wrap__title bcg-title" >Admin features </div><br><br>
                        <a class="sidebar-category__item__link" href="{{ route('admin.goods') }}">
                            edit goods
                        </a><br><br>
                        <a class="sidebar-category__item__link" href="{{ route('admin.categories') }}">
                            edit categories
                        </a><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
