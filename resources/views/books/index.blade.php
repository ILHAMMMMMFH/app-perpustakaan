<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Buku</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}">Tambah Buku</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>ISBN</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['penerbit'] }}</td>
                    <td>{{ $book['tahun_terbit'] }}</td>
                    <td>{{ $book['isbn'] }}</td>
                    <td>{{ $book['stok'] }}</td>
                    <td>{{ $book['kategori'] }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">Detail</a>
                        <a href="{{ route('books.edit', $book['id']) }}">Edit</a>

                        <form action="{{ route('books.destroy', $book['id']) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>