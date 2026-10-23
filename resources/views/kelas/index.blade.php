<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Data Kelas</h1>
    @if (session('success')) <p class="success">{{ session('success') }}</p> @endif @include('partials.nav')
    @if (auth()->user()->can('tambah-data'))
    <p><a href="{{ route('kelas.create') }}" class="btn">Tambah Kelas</a></p>
    @endif
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Angkatan</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> @forelse ($kelas as $k) <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->angkatan }}</td>
                <td>{{ $k->jurusan }}</td>
                <td>
                    @if (auth()->user()->can('ubah-data'))
                    <a href="{{ route('kelas.edit', $k->id) }}" class="btn">Ubah</a>
                    @endif
                    @if (auth()->user()->can('hapus-data'))
                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data kelas ini?')">@csrf @method('DELETE')<button type="submit">Hapus</button></form>
                    @endif
                    @if (!auth()->user()->can('ubah-data') && !auth()->user()->can('hapus-data')) <span>-</span> @endif
                </td>
            </tr> @empty <tr>
                <td colspan="5">Belum ada data kelas.</td>
            </tr> @endforelse </tbody>
    </table>
</body>

</html>