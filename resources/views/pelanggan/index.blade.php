<!-- resources/views/pelanggan/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
</head>
<body>
    <h1>Daftar Pelanggan</h1>
    <a href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>
    <ul>
        @foreach ($pelanggan as $pel)
            <li>
                {{ $pel->namaPelanggan }} - {{ $pel->noTlp }} - {{ $pel->email }}
                <a href="{{ route('pelanggan.show', $pel->id) }}">Detail</a>
                <a href="{{ route('pelanggan.edit', $pel->id) }}">Edit</a>
                <form action="{{ route('pelanggan.destroy', $pel->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
