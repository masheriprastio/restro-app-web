@extends('layouts.app')

@section('content')
<h3>Daftar Pesanan</h3>
<a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-2">Tambah Pesanan</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Menu</th>
      <th>Pelanggan</th>
      <th>Jumlah</th>
      <th>User</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pesanan as $p)
    <tr>
      <td>{{ $p->idpesanan }}</td>
      <td>{{ $p->menu->Namamenu }}</td>
      <td>{{ $p->pelanggan->Namapelanggan }}</td>
      <td>{{ $p->jumlah }}</td>
      <td>{{ $p->user->Namauser }}</td>
      <td>
        <a href="{{ route('pesanan.edit', $p->idpesanan) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('pesanan.destroy', $p->idpesanan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
