@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Umkm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Umkm</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Umkm</h6>
        <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Nama Toko</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Pemilik</th>
                <th>Aksi</th>
                <!-- <th>Salary</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach($seller_list as $item)
              <tr>
                <td>{{$item->nama_toko}}</td>
                <td>{{$item->nomor_telepon}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->nama_penjual}}</td>
                <td>
                  <a target="_blank" href="http://ppkm.babydaily.id/store/{{$item->id_penjual}}" class="btn btn-primary">Kunjungi</a>
                  <a href="/umkm/{{$item->id_penjual}}/edit" class="btn btn-outline-danger btn-icon">
                    <i data-feather="edit"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush