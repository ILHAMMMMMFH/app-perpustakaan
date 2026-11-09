<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Perpustakaan')</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #f9fafb; color: #111827; }
        nav { background: #1e293b; padding: 12px 24px; display: flex; gap: 16px; align-items: center; }
        nav a { color: #f8fafc; text-decoration: none; font-weight: 500; font-size: 14px; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 32px auto; padding: 0 16px; }
        table { width: 100%; border-collapse: collapse; background: #fff; border: 1px solid #e5e7eb; border-radius: 6px; overflow: hidden; margin-top: 16px; }
        th, td { padding: 10px 14px; border-bottom: 1px solid #e5e7eb; text-align: left; font-size: 14px; }
        th { background: #f1f5f9; font-weight: 600; }
        .btn { display: inline-block; padding: 6px 14px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; border: none; cursor: pointer; }
        .btn:hover { background: #1d4ed8; }
        .btn-success { background: #059669; }
        .btn-success:hover { background: #047857; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; padding: 10px 16px; border-radius: 4px; margin-bottom: 16px; }
        .inline { display: inline; }
        
        /* Tugas 2 - Badge status berwarna */
        .badge { display: inline-block; padding: 3px 8px; font-size: 12px; border-radius: 4px; font-weight: bold; }
        .badge-success { background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .badge-warning { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .badge-danger { background-color: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('books.index') }}">Buku</a>
        <a href="{{ route('categories.index') }}">Kategori</a>
        <a href="{{ route('members.index') }}">Anggota</a>
        <a href="{{ route('loans.index') }}">Peminjaman</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>