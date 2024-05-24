@extends('layouts.master')
@section('title', 'landingpage')


@section('content')
<div class="container-fluid py-4 ">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7">
                <h4>Discover. Connect Thrive</h4>
                <h1 class="fw-bold custom-h1 mb-3">Transform Your Shopping Experience</h1>
                <p>Welcome to Amandemy Shopping, where flavors of our signature Red Velvet Latte. Made with premium ingredients and expertly crafted to perfection, this delightful beverage is a true treat for your taste buds. Whether you're a coffee connoisseur or simply looking to satisfy your sweet cravings.</p>
                <a class="btn btn-info text-black fw-bold rounded px-3 py-2" href="{{route('products.index')}}">Buy Now!</a>
            </div>
            <div class="col-lg-5">
                <img src="https://dekorwebsite.com/storage/icon-3d-1617x1980/42.png" alt="Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>
@endsection