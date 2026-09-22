
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Member</title>
</head>
<body>

    <h1>Tambah Member</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">

            @error('nama')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}">

            @error('nim')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">

            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}">

            @error('nomor_telepon')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat">{{ old('alamat') }}</textarea>

            @error('alamat')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>

            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan</button>

    </form>

    <br>

    <a href="{{ route('members.index') }}">Kembali</a>

</body>
</html>

