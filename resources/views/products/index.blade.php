<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Produk</title>
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
.filter-links a {
text-decoration: none;
color: #007bff;
margin-right: 10px;
}
.filter-links a:hover {
text-decoration: underline;
}
.product-card {
background: #f9fbff;
padding: 15px;
border-radius: 12px;
transition: all 0.2s ease;
}
.product-card:hover {
background: #e9f1ff;
transform: scale(1.02);
}
.category-fashion {
background-color: #fce4ec !important; /* light pink */
}
.category-elektronik {
background-color: #e3f2fd !important; /* light blue */
}
.stats-box {
background: #e3f2fd;
border-radius: 12px;
padding: 15px;
margin-top: 30px;
}
/* --- Pagination Styling --- */
.pagination {
font-size: 0.85rem;
}
.page-item .page-link {
padding: 4px 8px;
border-radius: 6px;
}
.page-item .page-link svg {
width: 14px;
height: 14px;
}
.page-item {
margin: 0 2px;
}
</style>
</head>
<body>
<div class="container">
<h1 class="mb-3 text-center">Daftar Produk</h1>
<!-- Link Filter -->
<div class="filter-links mb-4 text-center">
<strong>Filter:</strong>
<a href="{{ route('products.index') }}">Semua</a> |
<a href="{{ route('products.index', 'elektronik') }}">Elektronik</a> |
<a href="{{ route('products.index', 'furniture') }}">Furniture</a> |
<a href="{{ route('products.index', 'fashion') }}">Fashion</a> |
<a href="{{ route('products.index', 'termurah') }}">Harga Termurah</a> |
<a href="{{ route('products.index', 'termahal') }}">Harga Termahal</a> |
<a href="{{ route('products.index', 'stok-menipis') }}">Stok Menipis</a> |
<a href="{{ route('products.index', 'stok-melimpah') }}">Stok Melimpah</a> |
<a href="{{ route('products.index', 'harga-rata-rata-atas') }}">Harga Rata-rata ke Atas</a>
</div>
<!-- Daftar Produk -->
<div class="row g-3">
@foreach($products as $product)
<div class="col-md-6">
<div class="product-card @if($product->category == 'Fashion') category-fashion @elseif($product->category == 'Elektronik') category-elektronik @endif">
<h5 class="fw-bold">{{ $product->name }}</h5>
<p class="mb-1">Kategori: <span class="badge bg-info textdark">{{ $product->category }}</span></p>
<p class="mb-1">Harga: <strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
<p>Stok:
@if($product->stock < 10)
<span class="text-danger fw-bold">{{ $product->stock
}}</span>
@else
{{ $product->stock }}
@endif
</p>
<a href="{{ route('products.detail', $product->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
</div>
</div>
@endforeach
</div>
<div class="mt-4 d-flex justify-content-center">
{{ $products->links('pagination::bootstrap-5') }}
</div>
<!-- Statistik Produk -->
<div class="stats-box">
<h5>Statistik Produk</h5>
<p>Total Produk: <strong>{{ $totalProducts }}</strong></p>
<p>Harga Rata-rata: <strong>Rp {{ number_format($avgPrice, 0, ',', '.')
}}</strong></p>
<p>Harga Tertinggi: <strong>Rp {{ number_format($maxPrice, 0, ',', '.')
}}</strong></p>
</div>
</div>
</body>
</html>