@extends('master.admin-master')

@section('title')
    Manage Slider | Company Website
@endsection

@section('body')
    <div class="col-lg-12 manage-bg">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2 class="text-left col-md-6">Home Sliders</h2>
                <div class="col-md-6 text-right"> <a href="{{route('add.slider')}}" class=" btn btn-primary text-white">Add New slider</a> </div>
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
                        <th scope="col" width="40%">Description</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td class="text-white">{{$slider->title}}</td>
                        <td>{!! $slider->description !!}</td>
                        <td><img src="{{asset($slider->image)}}" alt="" class="h-100 w-100"></td>
                        <td>
                            <a href="{{route('edit.slider', ['id' => $slider->id])}}" class="btn btn-warning btn-md text-dark">Edit</a>

                            <a href="" onclick="deleteSlider({{$slider->id}})" class="btn btn-danger btn-md text-dark">Delete</a>
                            <form action="{{route('delete.slider', ['id' => $slider->id])}}" method="POST" id="deleteSlider{{$slider->id}}">
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
        function deleteSlider(id) {
            event.preventDefault();
            var check = confirm('Are You Sure To DELETE This Slider?');

            if(check){
                document.getElementById('deleteSlider'+id).submit();
            }

        }
    </script>





@endsection
