{{-- @extends('layouts.master')
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

            <table class="table table-striped w-100 mt-3" id="datatable">
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
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
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

            table = $('#datatable').DataTable({
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
            ],
        });

    };

        return {
            init: function() {
                initTable1();
            },
        };
    }();
</script> --}}