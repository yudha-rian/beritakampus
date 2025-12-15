<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sedikit style tambahan agar tabel lebih enak dilihat */
        .table th { vertical-align: middle; }
    </style>
</head>
<body class="p-5 bg-light">
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold text-primary">📚 Daftar Buku</h2>
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary me-2">
                    👤 Tambah Anggota
                </a>
    
                <a href="{{ route('loans.create') }}" class="btn btn-warning shadow-sm me-2">
                    📋 Catat Peminjaman
                </a>
                <a href="{{ route('books.create') }}" class="btn btn-success shadow-sm">
                    + Tambah Buku
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Dipinjam</th>
                            <th class="text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr class="align-middle">
                            <td class="ps-4 fw-bold">{{ $book->title }}</td>
                            
                            <td class="text-secondary">{{ $book->author }}</td>
                            
                            <td>
                                @forelse($book->categories as $cat)
                                    <span class="badge bg-secondary me-1">{{ $cat->name }}</span>
                                @empty
                                    <span class="text-muted fst-italic small">Tanpa Kategori</span>
                                @endforelse
                            </td>

                            <td class="text-center">
                                <span class="{{ $book->stock == 0 ? 'text-danger fw-bold' : 'fw-bold' }}">
                                    {{ $book->stock }}
                                </span>
                            </td>

                            <td class="text-center">
                                @if($book->loans_count > 0)
                                    <span class="badge bg-info text-dark">{{ $book->loans_count }} Kali</span>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">
                                        Detail
                                    </a>

                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Yakin ingin menghapus buku ini? Semua riwayat peminjaman buku ini juga akan terhapus.')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <em>Belum ada data buku. Silakan tambah buku baru.</em>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>