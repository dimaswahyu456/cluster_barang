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
@slot('title') List Barang @endslot
@endcomponent

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('barang.create') }}"> Create Barang</a>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stock</th>
                <th>Satuan</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($res_barang as $item)
              <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>{{ $item->kode_alternatif}}</td>
                <td>{{ $item->nama_alternatif}}</td>
                <td>{{ $item->stock}}</td>
                <td>{{ $item->satuan}}</td>
                <td>
                  <a class="btn btn-info" href="{{ route('barang.show',$item->id_alternatif) }}">Show</a>
                  <a class="btn btn-primary" href="{{ route('barang.edit',$item->id_alternatif) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('barang.destroy',$item->id_alternatif) }}">Delete</a>
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