@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif
                <h2 style="text-align: center">Add New tag</h2> <br>
            <form method="post" action="{{ route('tags.store') }}">
                @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

        <div class="col-md-6">
            <input id="aunamethor" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required>

            @error('name')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>

 {{-- /// --}}





{{--            <div class="form-group">--}}
{{--                <label for="exampleInputEmail1">select newspaper </label>--}}

{{--                <select class="form-control" name="servicesIds[]" multiple>--}}
{{--                    @foreach($newspapers as $newspaper)--}}
{{--                    <option value="{{$newspaper -> id}}">{{$newspaper -> title}}</option>--}}
{{--                @endforeach--}}
{{--                </select>--}}

{{--            </div>--}}
            <button type="submit" class="btn btn-primary">{{__('Add Article')}}</button>
        </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@stop
