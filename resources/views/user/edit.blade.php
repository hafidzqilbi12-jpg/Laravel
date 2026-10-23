<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Edit Pengguna</h1>

    <p>
        <a href="{{ route('user.index') }}">← Kembali ke Data Pengguna</a>
    </p>

    @if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Username</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $user->name) }}"
            required>

        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required>

        <label for="password">Password Baru</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Kosongkan jika tidak ingin mengubah password">

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="">-- Pilih Role --</option>

            @foreach ($roles as $role)
            <option
                value="{{ $role->name }}"
                {{ old('role', $user->getRoleNames()->first()) == $role->name ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
            @endforeach
        </select>

        <p>
            <button type="submit">Simpan Perubahan</button>
        </p>
    </form>
</body>

</html>