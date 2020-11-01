@extends('_layouts.app-auth')

@section('title', 'Masuk Sebagai Mitra')
@section('content')
    <div class="card card-primary">
        <div class="card-header tx-18 font-weight-bold">Selamat Datang Kembali</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-2">
                    <label for="email" class="text-md-right">Email Kamu</label>
                    <input 
                        type="email"
                        name="email" 
                        value="{{ old('email') }}"
                        id="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required autocomplete="username" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="password" class="text-md-right">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        value=""
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required autocomplete="current-password" autofocus>
                </div>

                <div class="d-flex align-items-center justify-content-between  mb-3">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input 
                            {{ old('remember') ? 'checked' : '' }}
                            type="checkbox" 
                            name="remember"
                            class="custom-control-input" 
                            id="remember">
                        <label class="custom-control-label" for="remember">Ingat Saya ?</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="ml-auto" href="{{ route('password.request') }}"> Lupa Password ? </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-block btn-primary mb-2 mt-5">Masuk Sekarang</button>
            </form>
            <a href="{{ route('register') }}" class="btn btn-lg btn-block btn-outline-secondary">Belum Punya Akun</a>
        </div>
    </div>
@endsection