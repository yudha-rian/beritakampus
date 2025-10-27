@extends('layouts.admin')

@section('admin-content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manajemen Berita</h5>
                <p class="card-text">Kelola berita kampus.</p>
                <a href="#" class="btn btn-primary">Kelola Berita</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manajemen Pengumuman</h5>
                <p class="card-text">Kelola pengumuman kampus.</p>
                <a href="#" class="btn btn-primary">Kelola Pengumuman</a>
            </div>
        </div>
    </div>
</div>
@endsection
