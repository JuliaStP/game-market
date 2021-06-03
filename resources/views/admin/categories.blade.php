@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="content-head__title-wrap__title bcg-title">Category</div> <br><br>

                    <div class="card-body">
                        <a class="sidebar-category__item__link" href="{{route('admin.create')}}">Add category</a><br><br>

                        <table class="table table-bordered">
                            @foreach($cats as $cat)
                                <tr style="font-family: PT_Sans">
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->title}}</td>
                                    <td>{{$cat->desc}}</td>
                                    <td>
                                        <a class="catlist" href="{{route('admin.edit', ['id' => $cat->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="catlist" href="{{route('admin.delete', ['id' => $cat->id])}}">Delete</a>
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
