<!doctype html>
<html>
<body>
<h1>User: {{ $user->name }}</h1>
@if($user->profile)
 <p>Alamat: {{ $user->profile->address }}</p>
 <p>Telepon: {{ $user->profile->phone }}</p>
@else
 <p>Profil belum tersedia.</p>
@endif
</body>
</html>