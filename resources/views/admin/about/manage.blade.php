@extends('master.admin-master')

@section('title')
    About Section | Company Website
@endsection

@section('body')

    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2 class="text-left col-md-6">Home About</h2>
                <div class="col-md-6 text-right"> <a href="{{route('add.about')}}" class=" btn btn-primary text-white">Add About</a> </div>
            </div>

            @if(Session('message'))
                <div class="alert alert-dismissible fade show alert-danger text-center " role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="5%">SL</th>
                        <th scope="col" width="20%">Title</th>
                        <th scope="col" width="25%">Short Description</th>
                        <th scope="col" width="40%">Long Description</th>
                        <th scope="col" width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homeAbout as $about)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td >{{$about->title}}</td>
                            <td>{!! $about->short_description !!}</td>
                            <td>{!! $about->long_description !!}</td>
                            <td>
                                <a href="{{route('edit.about', ['id' => $about->id])}}" class="btn btn-warning btn-md text-dark mt-3">Edit</a>

                                <a href="" onclick="deleteAbout({{$about->id}})" class="btn btn-danger btn-md text-dark mt-3">Delete</a>
                                <form action="{{route('delete.about', ['id' => $about->id])}}" method="POST" id="deleteAbout{{$about->id}}">
                                    @csrf
                                </form>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        function deleteAbout(id) {
            event.preventDefault();
            var check = confirm('Are You Sure To DELETE This About Info?');

            if(check){
                document.getElementById('deleteAbout'+id).submit();
            }

        }
    </script>



@endsection
