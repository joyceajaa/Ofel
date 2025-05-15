<!DOCTYPE html>
<html>
<head>
    <title>Detail Lokasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detail Lokasi</h1>
        <p><strong>Nama:</strong> {{ $location->name }}</p>
        <p><strong>Kode Embed:</strong></p>
        <div>
            {!! $location->location !!}  <!-- Menampilkan embed code secara aman -->
        </div>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
