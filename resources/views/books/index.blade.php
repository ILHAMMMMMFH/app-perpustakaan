@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>

    <p><a href="{{ route('books.create') }}" class="btn">+ Tambah Buku</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['category']['nama_kategori'] ?? $book['category']['name'] ?? '-' }}</td>
                    <td>{{ $book['stok'] }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">Detail</a>
                        |
                        <a href="{{ route('books.edit', $book['id']) }}">Edit</a>
                        |
                        <form class="inline" action="{{ route('books.destroy', $book['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#dc2626; cursor:pointer; padding:0; text-decoration:underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $books->links() }}
    </div>
@endsection