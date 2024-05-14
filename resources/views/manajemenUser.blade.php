<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    @extends('layouts.master')
@section('content')
<div class="container mt-lg-4 mb-lg-3">
    <div class="row bg-info rounded px-3 py-3 w-100">
        <div class="d-flex justify-content-between">
            <h2 class="fw-semibold">List User</h2>
            <div class="d-flex justify-content-end">
                <a href="{{route('tambahuser')}}" class="btn btn-md btn-dark fw-bold my-auto me-1">Tambah User</a>
            </div>
        </div>

         <!-- Alert untuk pesan sukses atau error -->
         @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif

     @if (session('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{ session('error') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif
        <table class="table table-striped w-100 mt-3 text-center">
            <thead>
                <tr class="">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Umur</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                    <td>@if ($user->gender == 'male')
                            <button class="btn btn-success btn-md w-75 text-dark fw-bold ">Male</button>
                        @elseif ($user->gender == 'female')
                            <button class="btn btn-dark btn-md w-75 fw-bold ">Female</button>
                        @endif
                    </td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->birth }}</td>
                        <td>{{ $user->address }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{route('edit_user', $user->id)}}"
                                class="btn btn-warning btn-md">Update</a>
                                <form action="{{ route('delete_user', $user->id) }}" method="POST"
                                    class="ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-md btn-danger" type="submit">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
