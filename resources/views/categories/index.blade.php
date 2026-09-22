<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kategori</title>
</head>
<body>

    <h1>Daftar Kategori</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}">Tambah Kategori</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['nama_kategori'] }}</td>
                    <td>{{ $category['deskripsi'] }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category['id']) }}">
                            Edit
                        </a>

                        <form action="{{ route('categories.destroy', $category['id']) }}"
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