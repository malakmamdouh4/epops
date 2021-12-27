@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif

                <h2 style="text-align: center">Edit The Article</h2> <br>
            <form method="post" action="{{ route('articles.update',$article->id) }}" enctype="multipart/form-data">
                @csrf
              @method('PUT')

    <div class="form-group row">
        <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('author') }}</label>

        <div class="col-md-6">
            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $article->author }}" required>

            @error('author')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>

 {{-- /// --}}



 <div class="form-group row">
    <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('link') }}</label>

    <div class="col-md-6">
        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $article->link }}" required>

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
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title }}" required>

        @error('title')
        <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
        @enderror
    </div>

</div>
{{-- /// --}}
<div class="form-group row">
    <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('media') }}</label>

    <div class="col-md-6">
        <input id="media" type="file" class="form-control @error('media') is-invalid @enderror" name="media" value="{{ $article->media }}" >

        @error('media')
        <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
        @enderror
    </div>
</div>
{{-- /// --}}
<div class="form-group">
    <label for="exampleFormControlTextarea1">conclusion</label>
    <textarea class="form-control @error('conclusion') is-invalid @enderror" name="conclusion" id="exampleFormControlTextarea1" rows="3">{{ $article->conclusion }}</textarea>
    @error('conclusion')
    <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
    @enderror
  </div>
  {{-- '''''''' --}}
  <div class="form-group">
    <label for="exampleInputEmail1">select Tags </label>

    <select class="form-control" name="servicesIds[]" multiple>
        @foreach($tags as $tags)
        <option value="{{$tags -> id}}">{{$tags -> name}}</option>
    @endforeach
    </select>

</div>




            <button type="submit" class="btn btn-primary">{{__('update article')}}</button>
        </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@stop
