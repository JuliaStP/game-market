@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading controls-title">Edit game</div>
                    <form action="{{route('admin.savepro', ['id' => $good['id']])}}" method="post">
                        @csrf
                        <table class="table table-bordered table-product">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="title" value="{{$good->title}}">
                                    @if ($errors->has('title'))
                                        <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>
                                    <input type="text" name="category" value="{{$category}}">
                                    @if ($errors->has('category'))
                                        <div class="alert alert-danger">{{$errors->first('category')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>
                                    <input type="text" name="price" value="{{$good->price}}">
                                    @if ($errors->has('price'))
                                        <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea rows="12" cols="55" name="desc" id="textarea">{{$good->desc}}</textarea>
                                    @if ($errors->has('desc'))
                                        <div class="alert alert-danger">{{$errors->first('desc')}}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <button type="submit" id="create-product">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
