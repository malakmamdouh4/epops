@extends('layouts.main')

@section('content')

    <div class="col-lg-11 " style="margin: auto">
        <h1 style="text-align: center">Manage All Newspapers</h1><br>
        <div class="card">
            @if(session()->has('msg'))
            <div class="alert alert-danger">
                {{ session()->get('msg') }}
            </div>
            @endif
            <div class="card">
                @if(session()->has('msgedit'))
                <div class="alert alert-success">
                    {{ session()->get('msgedit') }}
                </div>
                @endif

            <div class="card-header">

                @if(count($newspapers)>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col">title</th>
                        <th scope="col"> link </th>
                        <th scope="col"> logo </th>

                        <th scope="col"> edit </th>
                        <th scope="col"> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($newspapers as $newspaper)
                        <tr>
                            <td> {{ $loop->index+1 }}</td>
                            <td> {{ $newspaper->title }}</td>
                        <td> {{ $newspaper->link }}</td>
                        <td>   <img  src="{{asset('uploads/media/'.$newspaper->logo)}}" class="img-circle d-block " width = "80px" height ="80px">
                        </td>
                        <td> <a href="{{ route('newspapers.edit',$newspaper->id ) }}" class="btn btn-success"> Edit </a> </td>
                        <td>
                            <form action="{{ route('newspapers.destroy',$newspaper->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <h2 style="text-align: center">there is no newspapers , you can add new one ...</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
