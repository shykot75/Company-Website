@extends('master.admin-master')

@section('title')
    Message Section | Company Website
@endsection

@section('body')

    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2 class="text-left col-md-6">Messages</h2>

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
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="15%">Email</th>
                        <th scope="col" width="20%">Subject</th>
                        <th scope="col" width="35%">Message</th>
                        <th scope="col" width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }} </td>
                            <td>{{ $message->subject }} </td>
                            <td>{{ $message->message }} </td>
                            <td>

                                <a href="" onclick="deleteMessage({{$message->id}})" class="btn btn-danger btn-md text-dark ">Delete</a>
                                <form action="{{route('delete.message', ['id' => $message->id])}}" method="POST" id="deleteMessage{{$message->id}}">
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
        function deleteMessage(id) {
            event.preventDefault();
            var check = confirm('Are You Sure To DELETE This Message?');

            if(check){
                document.getElementById('deleteMessage'+id).submit();
            }

        }
    </script>



@endsection
