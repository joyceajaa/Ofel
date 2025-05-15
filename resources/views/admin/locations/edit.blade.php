<!DOCTYPE html>
<html>
<head>
    <title>Edit Lokasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Lokasi</h1>
        <form action="{{ route('locations.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $location->name }}" required>
            </div>
            <div class="form-group">
                <label for="location">Kode Embed Lokasi:</label>
                <textarea class="form-control" id="location" name="location" rows="5" required>{{ $location->location }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('locations.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
