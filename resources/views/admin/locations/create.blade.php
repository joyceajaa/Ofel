<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Lokasi</h1>
        <form action="{{ route('admin.locations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Kode Embed Lokasi:</label>
                <textarea class="form-control" id="location" name="location" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
