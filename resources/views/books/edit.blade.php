<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>

    <h1>Edit Buku</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Judul:</label>
            <input type="text" name="judul" value="{{ old('judul', $book['judul']) }}">
        </p>

        <p>
            <label>Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis', $book['penulis']) }}">
        </p>

        <p>
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="{{ old('penerbit', $book['penerbit']) }}">
        </p>

        <p>
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book['tahun_terbit']) }}">
        </p>

        <p>
            <label>ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn', $book['isbn']) }}">
        </p>

        <p>
            <label>Stok:</label>
            <input type="number" name="stok" value="{{ old('stok', $book['stok']) }}">
        </p>

        <p>
            <label>Kategori:</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}"
                        {{ old('category_id', $book['category_id']) == $category['id'] ? 'selected' : '' }}>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Update</button>
    </form>

    <br>

    <a href="{{ route('books.index') }}">Kembali</a>

</body>
</html>