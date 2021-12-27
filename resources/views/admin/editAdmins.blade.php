
@extends('layouts.main')

@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">


                        <!-- /.col-md-6 -->
                    <div class="col-lg-7"  style="margin:auto">
                        @if(session()->has('msg'))
                        <div class="alert alert-success">
                            {{ session()->get('msg') }}
                        </div>
                        @endif
                        <div class="card">

                            <div class="card-header">

                                <h5 class="m-0">Edit Profile </h5>
                            </div>

                                <form method="POST" style="padding:25px" action="{{ route('admins.update' ,$editadmin->id ) }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $editadmin->email}}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="newPassword" class="col-md-4 col-form-label text-md-right">{{ __('old Password') }}</label>

                                        <div class="col-md-6">
                                           <input id="newPassword"  placeholder = "enter old password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="Password" required >

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
