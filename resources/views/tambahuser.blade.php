<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <a class="navbar-brand text-black fw-bold" href="">Amandemy Market</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-bold">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('manajemenproduk') }}">Manage Product</a>
                            </li>
                            @if(Auth::user()->hasRole('superadmin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('manajemenuser') }}">Manage User</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>

       

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
            <h2 class="text-center fw-bold" style="font-size: 20px">Tambah User</h2>
            <form class="mt-3" action="{{ route('Newuser.user') }}" method="POST">
                @csrf
               
                <div class="mb-1">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama User" required>
                @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                    
                </div>
               
                <div class="mb-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email User" required>
                    @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                  
                </div>
              
                <div class="mb-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password user" required>
                    @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                
                </div>
                
                <div class="mb-1">
                    <label for="age">Umur</label>
                    <input type="number" name="age" id="age" class="form-control" placeholder="Masukan Umur User" required>
                        
                    @error('age')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                </div>
                
                <div class="mb-1">
                    <div class="form-group mb-3">
                        <label for="birth">Tanggal Lahir</label>
                        <input type="date" name="birth" id="birth" class="form-control" required>
                        @error('birth')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-1">
                    <label for="role" class="form-label fw-semibold">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="user">User</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                    @error('role')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" class="form-select" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    @error('gender')
                    <div class="text-danger mt-2">{{ $message }}</div>
                   @enderror
                   
                </div>
               
                <div class="mb-3">
                    <label for="address">Alamat</label>
                <textarea name="address" id="address" class="form-control" placeholder="Masukan Alamat Kamu" required></textarea>
                @error('address')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <a href="{{route('manajemenuser')}}"class="btn btn-warning mx-auto text-dark">Kembali</a>
                        <button class="btn btn-dark mx-auto" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
