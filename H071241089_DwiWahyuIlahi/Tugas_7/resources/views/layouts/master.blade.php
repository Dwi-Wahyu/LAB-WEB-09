<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pesona Kota Daeng')</title>
    <style>
        :root {
            --primary-color: #0077b6; 
            --secondary-color: #00b4d8; 
            --text-color: #333;
            --background-light: #f4f4f9;
            --accent-color: #ffb703; 
        }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background-color: var(--background-light); 
            color: var(--text-color);
            line-height: 1.6;
        }
        .header { 
            background-color: var(--primary-color); 
            color: white; 
            padding: 20px 5%; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            font-size: 1.8em;
            margin: 0;
        }
        .nav-menu a { 
            color: white; 
            margin-left: 25px; 
            text-decoration: none; 
            font-weight: 600; 
            padding: 5px 0;
            transition: color 0.3s ease, border-bottom 0.3s ease;
        }
        .nav-menu a:hover { 
            color: var(--accent-color);
            border-bottom: 2px solid var(--accent-color);
        }
        .container { 
            padding: 30px 5%; 
            min-height: 75vh; 
            max-width: 1200px;
            margin: 0 auto;
        }
        .footer { 
            background-color: #333; 
            color: #ccc; 
            text-align: center; 
            padding: 20px 0; 
            font-size: 0.85em; 
        }
        h2 {
            color: var(--primary-color);
            border-bottom: 3px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Pesona Kota Daeng</h1>
        <nav class="nav-menu">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/destinasi') }}">Destinasi</a>
            <a href="{{ url('/kuliner') }}">Kuliner</a>
            <a href="{{ url('/galeri') }}">Galeri</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer">
        &copy; {{ date('Y') }} Eksplor Pariwisata Nusantara (Makassar). Tugas Praktikum Blade Templating.
    </footer>

</body>
</html>