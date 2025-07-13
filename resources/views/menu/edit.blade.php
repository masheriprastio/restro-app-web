@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Edit Menu</h3>

<form action="{{ route('menu.update', $menu->idmenu) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="Namamenu" class="form-label">Nama Menu</label>
      <input type="text" name="Namamenu" class="form-control" value="{{ $menu->Namamenu }}" required>
    </div>

    <div class="mb-3">
      <label for="Harga" class="form-label">Harga</label>
      <input type="number" name="Harga" class="form-control" value="{{ $menu->Harga }}" required>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
        @if($menu->gambar)
            <img src="/images/{{ $menu->gambar }}" width="100px">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Batal</a>
  </form>

  <hr>

  <form action="{{ route('menu.destroy', $menu->idmenu) }}" method="POST" onsubmit="return confirmHapus()">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mt-3">Hapus Menu</button>
  </form>
</div>

<script>
  function confirmHapus() {
    return confirm('Yakin ingin menghapus menu ini?');
  }
</script>
@endsection
