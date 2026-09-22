<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>

    <h1>Tambah Kategori</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <p>
            <label>Nama Kategori:</label>
            <input type="text"
                   name="nama_kategori"
                   value="{{ old('nama_kategori') }}">
        </p>

        <p>
            <label>Deskripsi:</label>
            <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        </p>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('categories.index') }}">Kembali</a>

</body>
</html>