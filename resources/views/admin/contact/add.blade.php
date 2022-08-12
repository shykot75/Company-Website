@extends('master.admin-master')

@section('title')
    ADD Contact | Company Website
@endsection

@section('body')
    <div class="col-lg-12 manage-about">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Contact</h2>
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
                <form action="{{route('create.contact')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="location">Contact Location</label>
                        <input type="text" class="form-control" id="location" name="location">
                        @error('location')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Contact Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="call">Contact Call</label>
                        <input type="text" class="form-control" id="call" name="call">
                        @error('call')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-3">
                        <button type="submit" class="btn btn-primary btn-default ">Add Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
