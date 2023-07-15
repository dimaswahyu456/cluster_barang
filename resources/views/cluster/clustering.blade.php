@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Tables @endslot
@slot('title') Hasil Hitung K-Means @endslot
@endcomponent

<div class="container">
    <br>

    <div class="card">
        <div class="card-header">
            <h2>Tabel Cetroid</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Cluster</th>
                            <th>QTY</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clusters as $clusterIndex => $cluster)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $centroids[$clusterIndex]['qty']}}</td>
                            <td>{{ $centroids[$clusterIndex]['stock']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>

    @foreach ($clusters as $clusterIndex => $cluster)
    <div class="card">
        <div class="card-header">
            <h2>Cluster {{ $clusterIndex + 1 }}</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Total Terjual</th>
                            <th>Sisa Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cluster as $point)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $point->kode_barang}}</td>
                            <td>{{ $point->nama_barang}}</td>
                            <td>{{ $point->qty}}</td>
                            <td>{{ $point->stock}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection