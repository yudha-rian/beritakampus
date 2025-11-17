<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan Baru</title>
    <style>
        /* Sedikit styling sederhana */
        body { font-family: sans-serif; margin: 2em; }
        div { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 300px; padding: 5px; border: 1px solid #ccc; border-radius: 4px;
        }
        textarea { height: 80px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>

    <h2>Form Tambah Pelanggan Baru</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops! Ada kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="phone">Telepon:</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <div>
            <label for="address">Alamat:</label>
            <textarea id="address" name="address">{{ old('address') }}</textarea>
        </div>

        <div>
            <button type="submit">Simpan Pelanggan</button>
        </div>
    </form>

</body>
</html>