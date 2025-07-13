@extends('layouts.app')

@section('content')
<h3>Tambah Menu</h3>
<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="Namamenu" class="form-label">Nama Menu</label>
    <input type="text" name="Namamenu" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="Harga" class="form-label">Harga</label>
    <input type="number" name="Harga" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    <input type="file" name="gambar" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
