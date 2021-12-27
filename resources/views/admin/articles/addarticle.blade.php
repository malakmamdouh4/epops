@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif
                <h2 style="text-align: center">Add New Article</h2> <br>
            <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf

    <div class="form-group row">
        <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('author') }}</label>

        <div class="col-md-6">
            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="" required>

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
        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="" required>

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
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required>

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
        <input id="media" type="file" class="form-control @error('media') is-invalid @enderror" name="media" value="" >

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
    <textarea class="form-control @error('conclusion') is-invalid @enderror" name="conclusion" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('conclusion')
    <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
    @enderror
  </div>



            <div class="form-group">
                <label for="exampleInputEmail1">select Tags </label>

                <select class="form-control" name="servicesIds[]" multiple>
                    @foreach($tags as $tags)
                    <option value="{{$tags -> id}}">{{$tags -> name}}</option>
                @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">select newspapers </label>

                <select class="form-control" name="newspaper" >
                    @foreach($newspapers as $newspaper)
                    <option value="{{$newspaper ->id}}">{{$newspaper ->title}}</option>
                @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">{{__('Add Article')}}</button>
        </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@stop
