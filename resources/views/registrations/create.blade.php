<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Pendaftaran Event Baru</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('registrations.store') }}" method="POST">
                        @csrf <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon/WA</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="event_type" class="form-label">Pilih Jenis Event</label>
                            <select class="form-select @error('event_type') is-invalid @enderror" name="event_type">
                                <option value="">-- Pilih Event --</option>
                                <option value="webinar" {{ old('event_type') == 'webinar' ? 'selected' : '' }}>Webinar</option>
                                <option value="workshop" {{ old('event_type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                <option value="training" {{ old('event_type') == 'training' ? 'selected' : '' }}>Training</option>
                            </select>
                            @error('event_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="institution" class="form-label">Institusi / Perusahaan (Opsional)</label>
                            <input type="text" class="form-control @error('institution') is-invalid @enderror" 
                                   id="institution" name="institution" value="{{ old('institution') }}">
                            @error('institution')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                            <a href="{{ route('registrations.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>