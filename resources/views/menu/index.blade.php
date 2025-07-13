@extends('layouts.app')

@section('content')
<h3>Daftar Menu</h3>
<a href="{{ route('menu.create') }}" class="btn btn-primary mb-2">Tambah Menu</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nama Menu</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $menu)
    <tr>
      <td>{{ $menu->idmenu }}</td>
      <td>{{ $menu->Namamenu }}</td>
      <td>Rp{{ number_format($menu->Harga, 0, ',', '.') }}</td>
      <td>
        @if($menu->gambar)
            <img src="/images/{{ $menu->gambar }}" width="100px">
        @endif
      </td>
      <td>
        <a href="{{ route('menu.edit', $menu->idmenu) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('menu.destroy', $menu->idmenu) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
