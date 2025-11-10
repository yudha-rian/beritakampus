<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Produk - {{ $product->name }}</title>
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
<style>
body {
background: #f6f9fc;
}
.container {
background: #fff;
border-radius: 15px;
padding: 30px;
box-shadow: 0 0 10px rgba(0,0,0,0.1);
margin-top: 40px;
}
.detail-card {
background: #f9fbff;
padding: 20px;
border-radius: 12px;
}
.category-fashion {
background-color: #fce4ec !important; /* light pink */
}
.category-elektronik {
background-color: #e3f2fd !important; /* light blue */
}
</style>
</head>
<body>
<div class="container">
<h1 class="mb-4 text-center">Detail Produk</h1>
<div class="detail-card @if($product->category == 'Fashion') category-fashion @elseif($product->category == 'Elektronik') category-elektronik @endif">
<h3 class="fw-bold">{{ $product->name }}</h3>
<p class="mb-2"><strong>Kategori:</strong> <span class="badge bg-info text-dark">{{ $product->category }}</span></p>
<p class="mb-2"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
<p class="mb-3"><strong>Stok:</strong>
@if($product->stock < 10)
<span class="text-danger fw-bold">{{ $product->stock }}</span>
@else
{{ $product->stock }}
@endif
</p>

{{-- INI BAGIAN YANG DIPERBAIKI (menambahkan tanda tanya ?) --}}
<p class="mb-3"><strong>Dibuat pada:</strong> {{ $product->created_at?->locale('id')->format('d F Y H:i') }}</p>
<p class="mb-3"><strong>Terakhir diupdate:</strong> {{ $product->updated_at?->locale('id')->format('d F Y H:i') }}</p>
{{-- AKHIR BAGIAN YANG DIPERBAIKI --}}

</div>
<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Produk</a>
</div>
</body>
</html>