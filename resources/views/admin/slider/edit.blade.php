@extends('master.admin-master')

@section('title')
    Edit Slider | Company Website
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Update Slider</h2>
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
                <form action="{{route('update.slider', ['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Slider Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Slider Description</label>
                        <textarea class="form-control summernote" id="description" rows="3"  name="description">{!! $slider->description !!}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="button">Slider Button</label>
                        <input type="text" class="form-control" id="button" name="button" value="{{$slider->button}}">
                    </div>

                    <div class="form-group">
                        <label for="image">Slider Image</label>
                        <img src="{{asset($slider->image)}}" class="img-thumbnail">
                        <input type="file" class="form-control-file" id="image" name="image" accept="images/*">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-footer pt-3">
                        <button type="submit" class="btn btn-primary btn-default ">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
