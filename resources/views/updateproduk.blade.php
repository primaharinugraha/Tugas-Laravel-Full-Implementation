<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

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
                            <a class="nav-link" href="{{route('manajemenproduk')}}">Manage Product</a>
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
        @if (Session::get('error'))
            <div class="row">
                <div class="col-md-4 offset-4 mt-2 py-2 rounded bg-danger text-white fw-bold">
                    {{ Session::get('error') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Edit Data Produk </h2>
                <form class="mt-3" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-1">
                        <label for="image" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="image" placeholder="Masukkan gambar produk" value="">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama produk" value="">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="berat" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" name="berat" placeholder="Masukkan berat produk" value="">
                        @error('berat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="harga" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan harga produk" value="">
                        @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="stok" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="Masukkan stok produk" value="">
                        @error('stok')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="kondisi" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control @error('kondisi') is-invalid @enderror" aria-label="Default select example" name="kondisi">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas" >Bekas</option>
                            <option value="Baru" >Baru</option>
                        </select>
                        @error('kondisi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 offset-md-3 mt-2">
                        <a href="{{route('manajemenproduk')}}"class="btn btn-warning mx-auto text-dark">Kembali</a>
                        <button class="btn btn-dark mx-auto" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
