@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading controls-title">Edit category</div>
                    <form action="{{route('admin.save', ['id' => $cat['id']])}}" method="post">
                        @csrf
                        <table class="table table-bordered table-product">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="title" value="{{$cat->title}}">
                                    @if ($errors->has('title'))
                                        <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea rows="12" cols="55" name="desc" id="textarea">{{$cat->desc}}</textarea>
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
