@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Kategori</h6>
        <form action="{{ url('/kategori/') }}" method="post">
        @csrf

          <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama Kategori">
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
          </div>

          <button class="btn btn-primary" type="submit">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    const nama_kategori = document.querySelector('#nama_kategori');
    const slug = document.querySelector('#slug');

    nama_kategori.addEventListener('change', function(){
        fetch('/kategori/checkSlug?nama_kategori=' + nama_kategori.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    })
</script>
@endsection
