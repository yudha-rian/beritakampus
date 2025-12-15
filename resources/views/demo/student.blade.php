<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .course-item { 
            border: 1px solid #ddd; 
            padding: 10px; 
            margin-bottom: 5px; 
            display: flex; 
            justify-content: space-between; 
            max-width: 400px;
        }
        .success { color: green; font-weight: bold; }
        form { display: inline; }
    </style>
</head>
<body>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <h1>Data Mahasiswa</h1>
    <p><strong>Nama:</strong> {{ $student->name }}</p>
    <p><strong>NIM:</strong> {{ $student->nim }}</p>

    <hr>

    <h3>Daftar Mata Kuliah (Courses)</h3>
    
    @if($student->courses->count() > 0)
        @foreach($student->courses as $course)
            <div class="course-item">
                <span>{{ $course->course_name }} ({{ $course->code }})</span>
                
                <form action="{{ route('student.detach', [$student->id, $course->id]) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </div>
        @endforeach
    @else
        <p>Belum mengambil mata kuliah apapun.</p>
    @endif

    <hr>

    <h3>Tambah Mata Kuliah</h3>
    <form action="{{ route('student.attach', $student->id) }}" method="POST">
        @csrf
        <label>Masukkan ID Course:</label>
        <input type="number" name="course_id" required placeholder="Contoh: 1">
        <button type="submit">Tambahkan</button>
    </form>

    <br><br>
    <a href="/">&laquo; Kembali</a>

</body>
</html>