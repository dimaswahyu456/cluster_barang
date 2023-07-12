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
@slot('title') List Data Cluster @endslot
@endcomponent


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal Rekam</th>
                <th>Code ICDX</th>
                <th>Nama Penyakit [Indonesia]</th>
                <th>Nama Kelompok Layanan</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($res_dc as $item)
              <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>{{ $item->tanggal_rekam}}</td>
                <td>{{ $item->code_icdx}}</td>
                <td>{{ $item->indonesia_desc}}</td>
                <td>{{ $item->nama_kelompok_layanan}}</td>
                <td>
                  <a class="btn btn-info" href="">Show</a>
                  <a class="btn btn-danger" href="">Delete</a>
                  @csrf
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection