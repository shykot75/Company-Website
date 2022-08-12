@extends('master.admin-master')

@section('title')
    Edit Portfolio | Company Website
@endsection

@section('body')
    <div class="col-lg-12 slider-manage">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Portfolio</h2>
            </div>
            @if(Session('message'))
                <div class="alert alert-dismissible fade show alert-success text-center " role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body">
                <form action="{{route('update.portfolio', ['id' => $portfolio->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="image">Portfolio Image</label>
                        <img src="{{asset($portfolio->image)}}" alt="" class="h-100 w-100">
                        <input type="file" class="form-control-file" id="image[]" name="image" accept="images/*" multiple="" >

                    </div>

                    <div class="form-group">
                        <label for="category">Portfolio Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$portfolio->category}}">
                        @error('category')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Portfolio Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$portfolio->title}}" >
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    <div class="form-footer pt-3">
                        <button type="submit" class="btn btn-primary btn-default ">Update Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
