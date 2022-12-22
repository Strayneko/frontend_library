@extends('templates.base')
@section('title', 'Daftar Buku')

@section('content')
    {{-- success message --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="my-4">Daftar Buku</h1>
    <a href="{{ route('book.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi/Sinopsis</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" style="width: 70px">
                    </td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['description'] }}</td>
                    <td>
                        <a href="{{ route('book.show', ['id' => $book['id']]) }}"
                            class="badge text-bg-success text-white">Detail</a>
                        <a href="{{ route('book.edit', ['id' => $book['id']]) }}"
                            class="badge text-bg-warning text-white">Edit</a>
                        <a href="{{ route('book.delete', ['id' => $book['id']]) }}" class="badge text-white text-bg-danger"
                            onclick="return confirm('apakah anda yakin?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
