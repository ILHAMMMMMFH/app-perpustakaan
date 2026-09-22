<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

    <h1>Tambah Buku</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <p>
            <label>Judul:</label>
            <input type="text" name="judul" value="{{ old('judul') }}">
        </p>

        <p>
            <label>Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis') }}">
        </p>

        <p>
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="{{ old('penerbit') }}">
        </p>

        <p>
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
        </p>

        <p>
            <label>ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}">
        </p>

        <p>
            <label>Stok:</label>
            <input type="number" name="stok" value="{{ old('stok') }}">
        </p>

        <p>
            <label>Kategori:</label>
            <select name="category_id">
                <option value="">-- Pilih Kategori --</option>

                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}"
                        {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('books.index') }}">Kembali</a>

</body>
</html>