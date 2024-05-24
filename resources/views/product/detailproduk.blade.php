@extends('layouts.master')
@section('title', 'Detail Produk')

@section('content')
<div class="container-fluid py-3">
    <div class="container border border-black w-75">
        <h2 class="text-center fw-bold mb-5">Detail Produk</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ asset($product->image) }}" alt="Image" class="img-fluid rounded heightdetailproduk">
            </div>
            <div class="col-md-6 mt-5 pe-5 mb-3">
                <h2 class="mb-5">{{ $product->name }}</h2>
                <div class="d-flex justify-content-between">
                    <p>Stock: {{ $product->stock }}</p>
                    <p class="fw-bold btn btn-info rounded-pill px-3">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between ">
                    <p>Kondisi: {{ $product->condition }}</p>
                    <p class="fw-bold">{{ $product->weight }} gr</p>
                </div>
                <p class="text-justify">{{ $product->description }}</p>
                @if($transaction)
                <a href="{{ route('transaction.detail', ['id' => $transaction->id]) }}" class="d-flex justify-content-center text-decoration-none">
                    <button class="btn btn-dark rounded">Checkout</button>
                </a>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
