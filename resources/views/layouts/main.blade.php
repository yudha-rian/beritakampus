<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>@yield('title') - Sistem Informasi Kampus</title>
<style>
body { font-family: Arial; margin: 40px; }
header, footer { text-align: center; }
nav a { margin: 0 10px; text-decoration: none; color: #333; }
nav a:hover { text-decoration: underline; }
.container { margin-top: 30px; }
h2 { color: #0066cc; }
</style>
</head>
<body>
<header>
<h1>Sistem Informasi Kampus</h1>
<nav>
<a href="/">Home</a>
<a href="/pengumuman">Pengumuman</a>
<a href="/dosen">Profil Dosen</a>
<a href="/kontak">Kontak</a>
<a href="/berita">Berita Kampus</a>
</nav>
<hr>
</header>
<div class="container">
@yield('content')
</div>
<footer>
<hr>
<p>&copy; 2025 Kampus Laravel</p>
</footer>
</body>
</html>