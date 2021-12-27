@extends('layouts.main')

@section('content')

    <div class="col-lg-11 " style="margin: auto">
        <h1 style="text-align: center">Manage All Tags</h1><br>
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

                @if(count($tags)>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Newspaper </th>
                        <th scope="col"> category </th>
                        <th scope="col"> edit </th>
                        <th scope="col"> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($tags as $tag)
                        <tr>
                            <td> {{ $loop->index+1 }}</td>
                            <td> {{ $tag->name}}</td>
                            <td> @foreach (  $tag->newspaper as  $tag->newspaper)
                                {{$tag->newspaper->title."/"}}
                           @endforeach</td>
                           {{-- <td> {{ $tag->is_category}}</td> --}}
                                <td>
                                    <form action="{{route('tags.update',$tag->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success"> {{$tag->is_category}} </button>


                                    </form>
                                </td>


                        <td> <a href="{{ route('tags.edit',$tag->id ) }}" class="btn btn-success"> Edit </a> </td>
                        <td>
                            <form action="{{ route('tags.destroy',$tag->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <h2 style="text-align: center">there is no articles , you can add new one ...</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
