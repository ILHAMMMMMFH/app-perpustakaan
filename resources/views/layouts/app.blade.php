<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital Kampus</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f8fafc; color: #1e293b; }
        nav { background-color: #0f172a; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; }
        nav .brand { color: #f8fafc; font-weight: bold; font-size: 18px; }
        nav ul { list-style: none; display: flex; gap: 16px; margin: 0; padding: 0; }
        nav ul li a { color: #94a3b8; text-decoration: none; font-size: 14px; padding: 6px 12px; border-radius: 4px; transition: all 0.2s; }
        nav ul li a:hover { color: #f8fafc; background-color: #1e293b; }
        nav ul li a.active { color: #f8fafc; background-color: #2563eb; font-weight: 600; }
        nav .navbar-user { display: flex; align-items: center; gap: 12px; color: #cbd5e1; font-size: 14px; }
        nav .btn-logout { background: none; border: 1px solid #cbd5e1; color: #cbd5e1; padding: 4px 10px; border-radius: 4px; cursor: pointer; font-size: 14px; }
        nav .btn-logout:hover { background: #1e40af; color: #fff; }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .card { background: white; border-radius: 8px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .btn { display: inline-block; padding: 8px 16px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; font-size: 14px; }
        .btn:hover { background-color: #1d4ed8; }
        .btn-danger { background-color: #ef4444; }
        .btn-danger:hover { background-color: #dc2626; }
        .btn-success { background-color: #10b981; }
        .btn-success:hover { background-color: #059669; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 12px; border-bottom: 1px solid #e2e8f0; text-align: left; font-size: 14px; }
        th { background-color: #f1f5f9; font-weight: 600; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; }
        .form-control { width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        .text-danger { color: #ef4444; font-size: 13px; margin-top: 4px; }
        .badge { display: inline-block; padding: 4px 8px; border-radius: 9999px; font-size: 12px; font-weight: 600; }
        .badge-success { background-color: #dcfce7; color: #166534; }
        .badge-warning { background-color: #fef9c3; color: #854d0e; }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main class="container">
        @include('partials.alert')
        @yield('content')
    </main>
</body>
</html>