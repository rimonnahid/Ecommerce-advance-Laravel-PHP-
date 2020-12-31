@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
@endsection

@section('content')
{{-- Login Banner --}}
<div class="home">
    <div class="home_background" data-parallax="scroll" data-image-src="{{asset('public/front/images/shop_background.jpg')}}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Welcome to back</h2>
    </div>
</div>

            <!-- form -->
    <form action="{{ Route('login') }}" method="post" >
        @csrf
        <div class="contact-grids1 w3agile-6">
            <div class="row">
                <div class="col-md-8 contact-form1 form-group offset-md-2">
                    <label class="col-form-label">E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-8 contact-form1 form-group offset-md-2">
                    <label class="col-form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger">Login With Google</a>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>

@endsection
@section('customscript')

<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
@endsection
