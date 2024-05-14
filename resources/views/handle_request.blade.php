<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Tambah Data Produk</h2>
                <form class="mt-3" action="{{route('newprodukk')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Field Gambar Produk -->
                    <div class="mb-1">
                        <label for="image" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" placeholder="Masukkan gambar produk" value="{{ old('image') }}">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Nama Produk -->
                    <div class="mb-1">
                        <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" placeholder="Masukkan nama produk" value="{{ old('nama') }}">
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Berat Produk -->
                    <div class="mb-1">
                        <label for="berat" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" name="berat"
                            id="berat" placeholder="Masukkan berat produk" value="{{ old('berat') }}">
                        @error('berat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Harga Produk -->
                    <div class="mb-1">
                        <label for="harga" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                            id="harga" placeholder="Masukkan harga produk" value="{{ old('harga') }}">
                        @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Stok Produk -->
                    <div class="mb-1">
                        <label for="stok" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                            id="stok" placeholder="Masukkan stok produk" value="{{ old('stok') }}">
                        @error('stok')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Kondisi -->
                    <div class="mb-1">
                        <label for="kondisi" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control @error('kondisi') is-invalid @enderror"
                            aria-label="Default select example" name="kondisi" id="kondisi">
                            <option selected value="0" @if(old('kondisi') == 0) selected @endif>Pilih Kondisi Barang</option>
                            <option value="Bekas" @if(old('kondisi') == 'Bekas') selected @endif>Bekas</option>
                            <option value="Baru" @if(old('kondisi') == 'Baru') selected @endif>Baru</option>
                        </select>
                        @error('kondisi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Field Deskripsi Produk -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                            id="deskripsi" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <a href="{{route('manajemenproduk')}}"
                                class="btn btn-warning mx-auto text-dark">Kembali</a>
                            <button class="btn btn-dark mx-auto" type="submit">Submit</button>
                        </div>
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
