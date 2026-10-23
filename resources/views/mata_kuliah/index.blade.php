<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <style>
        @include('partials.style')
    </style>
</head>

<body>
    <h1>Data Mata Kuliah</h1>
    @if (session('success')) <p class="success">{{ session('success') }}</p> @endif @include('partials.nav')
    @if (auth()->user()->can('tambah-data'))
    <p><a href="{{ route('mata-kuliah.create') }}" class="btn">Tambah Mata Kuliah</a></p>
    @endif
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> @forelse ($mataKuliah as $mk) <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mk->kode }}</td>
                <td>{{ $mk->nama_mata_kuliah }}</td>
                <td>{{ $mk->sks }}</td>
                <td>{{ $mk->semester }}</td>
                <td>
                    @if (auth()->user()->can('ubah-data'))
                    <a href="{{ route('mata-kuliah.edit', $mk->id) }}" class="btn">Ubah</a>
                    @endif
                    @if (auth()->user()->can('hapus-data'))
                    <form action="{{ route('mata-kuliah.destroy', $mk->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data mata kuliah ini?')">@csrf @method('DELETE')<button type="submit">Hapus</button></form>
                    @endif
                    @if (!auth()->user()->can('ubah-data') && !auth()->user()->can('hapus-data')) <span>-</span> @endif
                </td>
            </tr> @empty <tr>
                <td colspan="6">Belum ada data mata kuliah.</td>
            </tr> @endforelse </tbody>
    </table>
</body>

</html>