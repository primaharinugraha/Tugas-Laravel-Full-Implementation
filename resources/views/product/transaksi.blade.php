@extends('layouts.master')
@section('title', 'Transaksi')

@section('content')
    <div class="container-fluid py-3">
        <div class="container border border-3 w-50 p-3 rounded">
            <h3 class="text-center fw-bold">Invoice Transaksi {{$transaction->id}}</h3>
            <h5 class="border-bottom border-2 py-2 mb-3">Detail Transaksi</h5>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <p>No. Invoice</p>
                    <p class="fw-bold">{{ $transaction->invoice_number }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Admin Fee</p>
                    <p class="fw-bold">{{ $transaction->admin_fee }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Kode Unik</p>
                    <p class="fw-bold">{{ $transaction->unique_code }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total</p>
                    <p class="fw-bold">{{ $transaction->total_price }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Metode Pembayaran</p>
                    <p class="fw-bold">{{ $transaction->payment_method }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Status</p>
                    <p class="btn btn-{{ $transaction->payment_status == 'paid' ? 'success' : 'danger' }} text-dark fw-bold rounded-pill p-1 px-3">
                        {{ $transaction->payment_status }}
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tanggal Kadaluarsa</p>
                    <p class="fw-bold">{{ $transaction->expiry_date }}</p>
                </div>
            </div>
            <h5 class="border-bottom border-2 py-2 mb-3">Produk Yang Dibeli</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <img src="{{ $transaction->product->image }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h3 class="mt-5">{{ $transaction->product->name }}</h3>
                    <div class="d-flex justify-content-between">
                        <p >Stock: {{ $transaction->product->stock }}</p>
                        <p class="btn btn-info fw-bold rounded-pill px-3 py-1">Rp. {{ $transaction->product->price }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Kondisi: {{ $transaction->product->condition }}</p>
                        <p class="fw-bold">{{ $transaction->product->weight }}gr</p>
                    </div>
                </div>
            </div>
            <h5 class="border-bottom border-2 py-2 mb-3">Data Pembeli</h5>
            <div class="d-flex justify-content-between mb-2">
                <p>Nama</p>
                <p class="fw-bold">{{ $transaction->user->name }}</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p>Email</p>
                <p class="fw-bold">{{ $transaction->user->email }}</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p>Handphone</p>
                <p class="fw-bold">085825xxxx</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p>Alamat</p>
                <p class="fw-bold">{{ $transaction->user->address }}</p>
            </div>
        </div>
    </div>
@endsection
