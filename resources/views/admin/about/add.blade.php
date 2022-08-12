@extends('master.admin-master')

@section('title')
    ADD About | Company Website
@endsection

@section('body')
    <div class="col-lg-12 manage-about">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add About</h2>
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
                <form action="{{route('create.about')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="title">About Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control summernote" id="short_description" rows="3"  name="short_description"></textarea>
                            @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea class="form-control summernote" id="long_description" rows="3"  name="long_description"></textarea>
                            @error('long_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                    <div class="form-footer pt-3">
                        <button type="submit" class="btn btn-primary btn-default ">Add About</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
