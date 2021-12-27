@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col-md-6 -->
                <div class="col-lg-11 " style="margin: auto">
                    <div class="card">

                        <div class="card-body">
                            @if(session()->has('msg'))
                                <div class="alert alert-danger">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif
                            @if(count($users)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"> # </th>
                                    <th scope="col"> First Name </th>
                                    <th scope="col"> Last Name </th>
                                    <th scope="col"> Email </th>
                                    <th scope="col"> status </th>
                                    <th scope="col"> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @endif
                                @forelse($users as $user)
                                    <tr>
                                        <td> {{ $loop->index+1 }}</td>
                                        <td> {{ $user->first_name }}</td>
                                    <td> {{ $user->last_name }}</td>
                                    <td> {{ $user->email}}</td>
                                    <td>
                                        <form action="{{ route('edituserstatus',$user->id) }}" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            @csrf
                                            <button class="btn btn-success"> {{$user->status}} </button>
                                        </form>

                                    </td>

                                    <td>
                                        <form action="{{ route('deleteuser',$user->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button class="btn btn-danger"> Delete </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <h2 style="text-align: center">there is no user ...</h2>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@stop
