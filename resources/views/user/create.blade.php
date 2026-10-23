<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Tambah Pengguna</h1>

    @include('partials.nav')

    @if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <label for="name">Nama</label>
        <input type="text" id="name" name="name"
            value="{{ old('name') }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email"
            value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"
            required>

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="">-- Pilih Role --</option>
            @foreach ($roles as $role)
            <option value="{{ $role->name }}"
                {{ old('role') == $role->name ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
            @endforeach
        </select>

        <p>
            <button type="submit">Tambah Pengguna</button>
            <a href="{{ route('user.index') }}">Batal</a>
        </p>
    </form>
</body>

</html>