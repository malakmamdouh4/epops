@extends('layouts.main')

@section('content')

    <div class="col-lg-11 " style="margin: auto">
        <h1 style="text-align: center">Manage All Articles</h1><br>
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

                @if(count($articles)>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> author </th>
                        <th scope="col"> conclusion </th>

                        <th scope="col"> title </th>
                        <th scope="col"> newspaper </th>
                        {{-- <th scope="col"> media </th> --}}
                        <th scope="col"> edit </th>
                        <th scope="col"> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($articles as $article)
                        <tr>
                            <td> {{ $loop->index+1 }}</td>
                            <td> {{ $article->author }}</td>
                        <td> {{ $article->conclusion }}</td>
                            <td> {{ $article->title}}</td>
                        <td> {{  $article->newspaper[0]->title}}</td>
                        {{-- <td><img  src="{{asset('uploads/media/'.$article->media)}}" class="img-circle d-block " width = "80px" height ="80px" alt="no media"> --}}

                        </td>
                        <td> <a href="{{ route('articles.edit',$article->id ) }}" class="btn btn-success"> Edit </a> </td>
                        <td>
                            <form action="{{ route('articles.destroy',$article->id) }}" method="post">
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
