@extends('layouts.app')

@section('content')
<h3>Tambah Pesanan</h3>
<form action="{{ route('pesanan.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Menu</label>
    <select name="idmenu" class="form-control">@foreach($menu as $m)<option value="{{ $m->idmenu }}">{{ $m->Namamenu }}</option>@endforeach</select>
  </div>
  <div class="mb-3">
    <label>Pelanggan</label>
    <select name="idpelanggan" class="form-control">@foreach($pelanggan as $p)<option value="{{ $p->idpelanggan }}">{{ $p->Namapelanggan }}</option>@endforeach</select>
  </div>
  <div class="mb-3">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
