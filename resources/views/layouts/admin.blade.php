@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p>Selamat datang di panel admin.</p>
    @yield('admin-content')
</div>
@endsection
