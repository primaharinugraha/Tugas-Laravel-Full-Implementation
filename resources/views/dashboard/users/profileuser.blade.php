@extends('layouts.master')
@section('title', 'Profile')


@section('content')
    <div class="container-fluid py-3">
        <div class="container border border-black w-25 p-3 ">
            <h3 class="text-center fw-bold my-4">Halaman Dashboard User {{ Auth::user()->id }}</h2>
            <div class="row">
                <div class="col-md-7 fw-bold ">
                    <p>Nama Akun</p>
                    <p>Email</p>
                    <p>Gender</p>
                    <p>Umur</p>
                    <p>Tanggal Lahir</p>
                    <p>Alamat</p>
                </div>
                <div class="col-md-5">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->gender }}</p>
                    <p>{{ $user->age}}</p>
                    <p>{{ $user->birth}}</p>
                    <p>{{ $user->address }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-info text-black fw-bold  rounded" href="">Export Data</a>
                <a class="btn btn-danger text-white rounded" href="{{ route('logout') }}">Logout</a>
            </div>
           

        </div>
       
    </div>
@endsection
