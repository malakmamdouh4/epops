@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif

                <h2 style="text-align: center">Edit The Newspaper</h2> <br>
            <form method="post" action="{{ route('newspapers.update',$Newspaper->id) }}" enctype="multipart/form-data">
                @csrf
              @method('PUT')


 {{-- /// --}}



 <div class="form-group row">
    <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('link') }}</label>

    <div class="col-md-6">
        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $Newspaper->link }}" required>

        @error('link')
        <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
        @enderror
    </div>
</div>

{{-- /// --}}
<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $Newspaper->title }}" required>

        @error('title')
        <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
        @enderror
    </div>

</div>
{{-- /// --}}
<div class="form-group row">
    <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('logo') }}</label>

    <div class="col-md-6">
        <input id="media" type="file" class="form-control @error('logo') is-invalid @enderror" name="media" value="{{ $Newspaper->logo }}" >

        @error('media')
        <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
        @enderror
    </div>
</div>
{{-- //// --}}
<div class="form-group">
    <label for="exampleInputEmail1">select Tags </label>

    <select class="form-control" name="servicesIds[]" multiple>
        @foreach($tags as $tags)
        <option value="{{$tags -> id}}">{{$tags -> name}}</option>
    @endforeach
    </select>

</div>

{{-- /// --}}<br>

<div class="form-group row">
    <label for="media" class="col-md-4 col-form-label text-md-right"></label>
    <button type="submit" class="btn btn-primary">{{__('update newspaper')}}</button>
</div>




        </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@stop
