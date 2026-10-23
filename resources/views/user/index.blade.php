<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Data Pengguna</h1>

    @include('partials.nav')

    @if (session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
    <p class="errors">{{ session('error') }}</p>
    @endif

    @if (auth()->user()->can('tambah-data'))
    <p><a href="{{ route('user.create') }}" class="btn">Tambah Pengguna</a></p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                <td>
                    @if (auth()->user()->can('ubah-data'))
                    <a href="{{ route('user.edit', $user->id) }}" class="btn">Ubah</a>
                    @endif

                    @if ($user->id !== auth()->id() && auth()->user()->can('hapus-data'))
                    <form action="{{ route('user.destroy', $user->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Hapus</button>
                    </form>
                    @elseif ($user->id === auth()->id())
                    <span>Akun sendiri</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada data pengguna.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</body>

</html>