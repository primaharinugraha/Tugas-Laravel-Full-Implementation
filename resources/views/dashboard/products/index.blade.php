@extends('layouts.master')
@section('title', 'Manage Product')

@section('content')
    <div class="container mt-lg-4 mb-lg-3">
        <div class="row bg-info rounded px-3 py-3 w-100">
            <div class="d-flex justify-content-between">
                <h2 class="fw-semibold">List Product</h2>
                <div class="d-flex justify-content-end">
                    <!-- export excel button -->
                    <a href="{{route('profile.users', [ Auth::user()->id])}}" class="btn btn-md btn-primary fw-bold my-auto me-1">Lihat Profil</a>
                    <a href="{{ route('dashboard.products.add') }}" class="btn btn-md btn-dark fw-bold my-auto me-1">Tambah Produk</a>
                    <a href="" class="btn btn-md btn-success fw-bold my-auto me-1">Import Produk</a>
                    <a href="{{ route('dashboard.products.export') }}" class="btn btn-md btn-warning fw-bold my-auto me-1">Export Produk</a>
                </div>
            </div>

            @if (Session::get('success'))
                <div class="alert alert-success mt-3">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('error'))
                <div class="alert alert-danger mt-3">
                    {{ Session::get('error') }}
                </div>
            @endif

            <table class="table table-striped w-100 mt-3" id="">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Stok</th>
                        <th scope="col" class="text-center">Berat</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Kondisi</th>
                        <th scope="col" class="text-center" style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $product->name }}</td>
                            <td class="text-center">{{ $product->stock }}</td>
                            <td class="text-center">{{ $product->weight }}</td>
                            <td class="text-center">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            @if ($product->condition == 'Baru')
                                <td class="text-center"><div
                                        class="rounded px-3 py-1 bg-success w-50 fw-bold mx-auto">{{ $product->condition }}</div></td>
                            @else
                                <td class="text-center"><div
                                        class="rounded px-3 py-1 bg-primary text-dark fw-bold  w-50 mx-auto">{{ $product->condition }}</div></td>
                            @endif
                            <td class="d-flex">
                                <a href="{{ route('dashboard.products.edit', ['id' => $product->id]) }}"
                                    class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('dashboard.products.delete', ['id' => $product->id]) }}" method="POST"
                                    class="ms-1">
                                    @csrf()
                                    <button class="btn btn-sm btn-danger" type="submit" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- Pagination -->
             
                {{ $products->links('pagination::bootstrap-5') }}
           
            <!-- End Pagination -->
        </div>
    </div>
@endsection

{{-- <script>
    $(document).ready(function(){
        KTDatatablesDataSourceAjaxServer.init();
    });

    var table;
    $.ajaxSetup({
        headers: {
            'x-CSRF-TOKEN' : '{{ csrf_token() }}'
        }
    });

    var KTDatatablesDataSourceAjaxServer = function() {
        var initTable1 = function() {
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('datatable') }}',
                type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                { data: 'name', name: 'name', className: 'text-center' },
                { data: 'stock', name: 'stock', className: 'text-center' },
                { data: 'weight', name: 'weight', className: 'text-center' },
                { data: 'price', name: 'price', className: 'text-center' },
                { data: 'condition', name: 'condition', className: 'text-center' },
                { data: 'action', name: 'action',  orderable: false, searchable: false }
            ],
            order: [
                [1, 'asc']
            ]
        };

        return {
            init: function() {
                initTable1();
            }
        };
    }();
</script> --}}