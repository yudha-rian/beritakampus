<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container" style="max-width: 600px;">
        <h2 class="mb-4">Daftar Anggota Baru</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">Info Akun</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-success text-white">Data Profil</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Nomor Telepon</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="birthdate" class="form-control" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Anggota</button>
            <a href="{{ route('books.index') }}" class="btn btn-light w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>