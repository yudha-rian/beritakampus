<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catat Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container" style="max-width: 600px;">
        <h2 class="mb-4">Catat Peminjaman Baru</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('loans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Siapa yang meminjam?</label>
                <select name="user_id" class="form-select" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                <small class="text-muted">Pastikan User sudah dibuat (lewat seeder/manual).</small>
            </div>

            <div class="mb-3">
                <label>Buku apa yang dipinjam?</label>
                <select name="book_id" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Peminjaman</button>
            <a href="{{ route('books.index') }}" class="btn btn-light w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>