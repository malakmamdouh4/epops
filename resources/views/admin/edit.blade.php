
@extends('layouts.main')

@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">


                        <!-- /.col-md-6 -->
                    <div class="col-lg-7"  style="margin:auto">

                        <div class="card">

                            <div class="card-header">

                                <h5 class="m-0">Edit Profile </h5>
                            </div>

                            <div class="card-body">
                                @if(session()->has('msgImg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msgImg') }}
                                </div>
                                @endif


                                 <img  src="{{asset('uploads/admin/'.$admin->avatar)}}" class="img-circle mx-auto d-block " width = "250px" height ="250px">
                                <br> <form method="POST" action="{{ route('updateImage') }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                        <div class="col-md-6">
                                            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ $admin->avatar }}"  autocomplete="avatar" autofocus>

                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
                                                {{ __(' Edit profile Picture ') }}
                                            </button>
                                        </div>
                                    </div>
                                 </form>
                                 <br>
                                 <div class="card-header">
                                    <h5 class="m-0">General Account Settings</h5>
                                </div>
                                <br>
                                 @if(session()->has('msg'))
                                 <div class="alert alert-success">
                                     {{ session()->get('msg') }}
                                 </div>
                                 @endif
                                <form method="POST" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label> <br>

                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $admin->first_name }}" required autocomplete="first_name" autofocus>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$admin->last_name }}" required autocomplete="last_name" autofocus>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email}}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
                                                {{ __(' Save Changes ') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <br><br>
                                <div class="card-header">
                                    <h5 class="m-0">Edit Password </h5>
                                </div>
                                @if(session()->has('msgincorrect'))
                                <div class="alert alert-danger">
                                    {{ session()->get('msgincorrect') }}
                                </div>
                                @endif
                                @if(session()->has('msgpass'))
                                <div class="alert alert-success">
                                    {{ session()->get('msgpass') }}
                                </div>
                                @endif
                                <form action="{{ route('updatePassword') }}" method="post">
                                    <br>
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group row">
                                        <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('old Password') }}</label>

                                        <div class="col-md-6">
                                           <input id="oldPassword"  placeholder = "enter old password" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required >

                                            @error('oldPassword')

                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('new Password') }}</label>

                                        <div class="col-md-6">
                                           <input id="password" placeholder = "enter new password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required >
                                           @error('newPassword')

                                           <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                           @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
                                                {{ __(' Save Changes ') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>


                    </div>
                    <!-- /.col-md-6 -->
                </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
@stop
