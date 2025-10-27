@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Berita Kampus</h1>

    <x-alert type="info" message="Berita terbaru dari kampus." />

    <div class="row">
        @foreach($berita as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['judul'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['judul'] }}</h5>
                    <p class="card-text text-muted">{{ $item['tanggal'] }}</p>
                    <p class="card-text">{{ $item['isi'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
