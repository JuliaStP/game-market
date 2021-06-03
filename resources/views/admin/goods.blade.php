@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h3 class="content-head__title-wrap__title bcg-title">Products</h3>

                <div class="card-body">
                    <a class="sidebar-category__item__link" href="{{route('admin.createpro')}}">Add product</a><br><br>

                    <table class="table table-bordered">
                        @foreach($goods as $good)
                        <tr style="font-family: PT_Sans" >
                            <td>{{$good->id}}</td>
                            <td>{{$good->title}}</td>
                            <td>{{$good->desc}}</td>
                            <td>
                                <a class="catlist" href="{{route('admin.editpro', ['id' => $good->id])}}">Edit</a>
                            </td>
                            <td>
                                <a class="catlist" href="{{route('admin.deletepro', ['id' => $good->id])}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
