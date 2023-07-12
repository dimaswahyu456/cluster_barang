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
@slot('title') Hasil Klasterisasi @endslot
@endcomponent

<div class="container">
    <h1>Hasil Klasterisasi</h1>
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
                            <th>Indonesia Description</th>
                            <th>Kecamatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Kelompok Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clusters as $clusterIndex => $cluster)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $centroids[$clusterIndex]['indonesia_desc']}}</td>
                            <td>{{ $centroids[$clusterIndex]['kecamatan']}}</td>
                            <td>{{ $centroids[$clusterIndex]['jenis_kelamin']}}</td>
                            <td>{{ $centroids[$clusterIndex]['umur']}}</td>
                            <td>{{ $centroids[$clusterIndex]['layanan']}}</td>
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
                            <th>Tanggal Rekam</th>
                            <th>Code ICDX</th>
                            <th>Indonesia Description</th>
                            <th>Kecamatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Kelompok Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cluster as $point)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $point->tanggal_rekam}}</td>
                            <td>{{ $point->code_icdx}}</td>
                            <td>{{ $point->indonesia_desc}}</td>
                            <td>{{ $point->kecamatan}}</td>
                            <td>{{ $point->jenis_kelamin}}</td>
                            <td>{{ $point->umur}}</td>
                            <td>{{ $point->layanan}}</td>
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