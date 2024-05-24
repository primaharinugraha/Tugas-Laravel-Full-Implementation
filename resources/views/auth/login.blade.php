@extends('layouts.master')
@section('title', 'Login Page')

@section('content')
    <div class="mx-lg-5 mt-lg-4 mb-lg-3">
        <div class="rounded  pt-3 pb-3">
          
            <div class="grid mx-3 mt-4">
                <div class="row row-gap-4 justify-content-center">
                    <div class="col-4">

                        <!-- error message -->
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card bg-white w-100 border border-black">
                            <div class="card-body">
                                <form action="{{ route('login.authenticate') }}" method="POST">
                                    @csrf
                                    <h2 class="text-center mb-3 fw-bold mb-3">Halaman Login Pengguna</h2>
                                    <div class="mb-3">
                                        <label for="email" class="form-label" >Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Masukan Email Kamu" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Masukan Password Kamu" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-black">Daftar Sekarang</a></label>
                                    </div>
                                    
                                   
                                    <div class="d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-lg btn-success w-25">Submit</button>
                                    </div>
                                    <p class="text-center mt-2 ">atau</p>

                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('google.login') }}" class="btn btn-md btn-info w-50 text-white">
                                            <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo" style="height: 25px;" class="me-2">
                                            Login dengan Google
                                        </a>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection