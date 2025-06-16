<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RestoApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">RestoApp</a>
      <ul class="navbar-nav me-auto">
        @auth
          @if(Auth::user()->Namauser == 'Administrator')
            <li class="nav-item"><a class="nav-link" href="{{ route('meja.index') }}">Entri Meja</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('menu.index') }}">Entri Barang</a></li>
          @elseif(Auth::user()->Namauser == 'Waiter')
            <li class="nav-item"><a class="nav-link" href="{{ route('menu.index') }}">Entri Barang</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a></li>
          @elseif(Auth::user()->Namauser == 'Kasir')
            <li class="nav-item"><a class="nav-link" href="{{ route('order.index') }}">Entri Order</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('transaksi.index') }}">Entri Transaksi</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a></li>
          @elseif(Auth::user()->Namauser == 'Owner')
            <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a></li>
          @endif
          <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
