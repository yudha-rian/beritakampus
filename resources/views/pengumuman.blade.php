@extends('layouts.main')
@section('title', $judul)
@section('content')
<h2>{{ $judul }}</h2>
@empty($pengumuman)
<p>Tidak ada pengumuman saat ini.</p>
@else
<ul>
@foreach($pengumuman as $a)
<li>
<strong>{{ $a['judul'] }}</strong> - {{ $a['tanggal'] }}
@if ($a['status'] == 'Aktif')
<x-alert type="success" message="(Aktif)" />
@else
<x-alert type="error" message="(Tidak Aktif)" />
@endif
</li>
@endforeach
</ul>
@endempty
@endsection
