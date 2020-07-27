@extends('layouts.auth')

@section('auth.content')

    <div class="container">
        <div class="row justify-content-center" style="height: 100vh">
            <div class="d-flex flex-column col-md-8 mt-5" style="height: 100vh">
                <div class="spacer" style="height: 150px" ></div>
                <div class="card">
                    <div class="card-header"> {{ ucfirst($url) }} Login </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url("/login/$url") }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"> Username </label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control
                                                @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"
                                           autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> Password </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control
                                            @error('password') is-invalid @enderror" name="password"
                                           autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
