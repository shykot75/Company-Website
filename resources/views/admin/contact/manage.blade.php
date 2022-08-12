@extends('master.admin-master')

@section('title')
    Contact Section | Company Website
@endsection

@section('body')

    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2 class="text-left col-md-6">Contact Us</h2>
                <div class="col-md-6 text-right"> <a href="{{route('add.contact')}}" class=" btn btn-primary text-white">Add Contact</a> </div>
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
                        <th scope="col" width="5%%">SL</th>
                        <th scope="col" width="20%">Location</th>
                        <th scope="col" width="25%">Email</th>
                        <th scope="col" width="30%">Call</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->location }}</td>
                            <td>{{ $contact->email }} </td>
                            <td>{{ $contact->call }} </td>
                            <td>
                                <a href="{{route('edit.contact', ['id' => $contact->id])}}" class="btn btn-warning btn-md text-dark ">Edit</a>

                                <a href="" onclick="deleteContact({{$contact->id}})" class="btn btn-danger btn-md text-dark ">Delete</a>
                                <form action="{{route('delete.contact', ['id' => $contact->id])}}" method="POST" id="deleteContact{{$contact->id}}">
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
        function deleteContact(id) {
            event.preventDefault();
            var check = confirm('Are You Sure To DELETE This Contact Info?');

            if(check){
                document.getElementById('deleteContact'+id).submit();
            }

        }
    </script>



@endsection
