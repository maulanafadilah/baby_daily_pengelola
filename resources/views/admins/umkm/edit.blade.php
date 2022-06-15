@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/umkm">Umkm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Akun UMKM</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit Kata Sandi Umkm</h6>
        <form action="/umkm/{{$account->id}}" method="post">
        @method('PUT')  
        @csrf

          <div class="mb-3">
            <label for="exampleInputPassword3" class="form-label">Kata Sandi Baru</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Masukkan Kata Sandi Baru">
          </div>

          <button class="btn btn-primary" type="submit">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
