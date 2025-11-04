<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    
    <style>
        body { font-family: sans-serif; margin: 2rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .no-data { text-align: center; color: #888; }
    </style>
</head>
<body>

    <h1>Daftar Mahasiswa Aktif</h1>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Angkatan</th>
                <th>IPK Terakhir</th>
            </tr>
        </thead>
        <tbody>
            {{-- 
              Ini adalah perulangan Blade. 
              $mahasiswaList adalah variabel yang kita kirim dari Controller (Langkah A)
            --}}
            @forelse ($mahasiswaList as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama_mahasiswa }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $mhs->angkatan }}</td>
                    <td>{{ number_format($mhs->ipk_terakhir, 2) }}</td>
                </tr>
            @empty
                {{-- Ini akan tampil jika $mahasiswaList kosong --}}
                <tr>
                    <td colspan="6" class="no-data">
                        Tidak ada data mahasiswa aktif yang ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>