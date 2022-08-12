@extends('master.admin-master')

@section('title')
    Manage Portfolio | Company Website
@endsection

@section('body')
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2 class="text-left col-md-6">Portfolio</h2>
                <div class="col-md-6 text-right"> <a href="{{route('add.portfolio')}}" class=" btn btn-primary text-white">Add New Portfolio</a> </div>
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
                        <th scope="col" width="15%">category</th>
                        <th scope="col" width="40%">Image</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td scope="row">{{  $portfolios->firstItem()+$loop->index  }}</td>
                            <td >{{ $portfolio->title }}</td>
                            <td>{{  $portfolio->category }}  </td>
                            <td><img src="{{asset($portfolio->image)}}" alt="" height="300" width="300"></td>
                            <td>
                                <a href="{{route('edit.portfolio', ['id' => $portfolio->id])}}" class="btn btn-warning btn-md text-dark">Edit</a>

                                <a href="" onclick="deletePortfolio({{$portfolio->id}})" class="btn btn-danger btn-md text-dark">Delete</a>
                                <form action="{{route('delete.portfolio', ['id' => $portfolio->id])}}" method="POST" id="deletePortfolio{{$portfolio->id}}">
                                    @csrf
                                </form>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $portfolios->links()  }}
            </div>
        </div>
    </div>

    <script>
        function deletePortfolio(id) {
            event.preventDefault();
            var check = confirm('Are You Sure To DELETE This Portfolio?');

            if(check){
                document.getElementById('deletePortfolio'+id).submit();
            }

        }
    </script>





@endsection
