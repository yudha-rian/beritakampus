@extends('layouts.main')
@section('title', $judul)
@section('content')
<h2>{{ $judul }}</h2>
@isset($dosen)
<p><strong>Nama:</strong> {{ $dosen['nama'] }}</p>
<p><strong>NIDN:</strong> {{ $dosen['nidn'] }}</p>
<p><strong>Email:</strong> {{ $dosen['email'] }}</p>
@empty($dosen['alamat'])
<p><em>Alamat belum diisi.</em></p>
@else
<p><strong>Alamat:</strong> {{ $dosen['alamat'] }}</p>
@endempty
@endisset
@endsection