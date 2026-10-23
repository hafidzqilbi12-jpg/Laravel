<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>

    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Ubah Data Role</h1>

    @include('partials.nav')

    @if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Nama Role</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $role->name) }}"
                required>
        </p>

        <h3>Permission</h3>

        @php
        $selectedPermissions = old(
        'permissions',
        $role->permissions->pluck('name')->toArray()
        );
        @endphp

        @forelse ($permissions as $permission)
        <p>
            <label>
                <input
                    type="checkbox"
                    name="permissions[]"
                    value="{{ $permission->name }}"
                    {{ in_array($permission->name, $selectedPermissions) ? 'checked' : '' }}>
                {{ $permission->name }}
            </label>
        </p>
        @empty
        <p>Belum ada permission. Permission perlu dibuat terlebih dahulu.</p>
        @endforelse

        <button type="submit" class="btn">Simpan Perubahan</button>
        <a href="{{ route('role.index') }}" class="btn">Batal</a>
    </form>
</body>

</html>