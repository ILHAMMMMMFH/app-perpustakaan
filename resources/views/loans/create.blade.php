@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Tambah Transaksi Peminjaman</h2>

    <p><em>Petugas pencatat: {{ auth()->user()->name }} (otomatis dari akun yang login).</em></p>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="member_id">Anggota</label>
            <select name="member_id" id="member_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->code }} - {{ $member->name }}
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
            @error('tanggal_pinjam')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali (Jatuh Tempo)</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali', date('Y-m-d', strtotime('+7 days'))) }}" required>
            @error('tanggal_kembali')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Pilih Buku yang Dipinjam</label>
            @foreach ($books as $book)
                <div style="margin-bottom: 6px;">
                    <label style="font-weight: normal; cursor: pointer;">
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" {{ is_array(old('book_ids')) && in_array($book->id, old('book_ids')) ? 'checked' : '' }}>
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </label>
                </div>
            @endforeach
            @error('book_ids')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan Peminjaman</button>
        <a href="{{ route('loans.index') }}" class="btn" style="background-color: #64748b;">Kembali</a>
    </form>
</div>
@endsection