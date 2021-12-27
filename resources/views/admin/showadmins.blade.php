@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col-md-6 -->
                <div class="col-lg-11 " style="margin: auto">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"> <a href="{{ route('admins.create') }}" class="btn btn-primary"> Add Admin </a> </h5>
                        </div>
                        <div class="card-body">
                            @if(session()->has('msg'))
                                <div class="alert alert-danger">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif
                            @if(count($admins)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"> # </th>
                                    <th scope="col"> First Name </th>
                                    <th scope="col"> Last Name </th>
                                    <th scope="col"> Email </th>
                                    <th scope="col"> Avatar </th>
                                    <th scope="col"> Edit </th>
                                    <th scope="col"> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @endif
                                @forelse($admins as $adm)
                                    <tr>
                                        <td> {{ $loop->index+1 }}</td>
                                        <td> {{ $adm->first_name }}</td>
                                    <td> {{ $adm->last_name }}</td>
                                    <td> {{ $adm->email}}</td>
                                    <td>   <img  src="{{asset('uploads/admin/'.$adm->avatar)}}" class="img-circle d-block " width = "80px" height ="80px">
                                    </td>
                                    <td> <a href="{{ route('admins.edit' ,$adm->id ) }}" class="btn btn-success"> Edit </a> </td>
                                    <td>
                                        <form action="{{ route('admins.destroy',$adm->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button class="btn btn-danger"> Delete </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <h2 style="text-align: center">there is no admin , you can add new one ...</h2>
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
