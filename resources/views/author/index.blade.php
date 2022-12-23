@inject('carbon', 'Carbon\Carbon')

@extends('templates.base')
@section('title', 'Daftar Author')

@section('content')
    {{-- success message --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="my-4">Daftar Author</h1>
    <a href="{{ route('author.create') }}" class="btn btn-primary mb-4">Tambah Author</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ $author['photo'] }}" alt="{{ $author['name'] }}" style="width: 70px">
                    </td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['gender'] == 0 ? 'Perempuan' : 'Laki - Laki' }}</td>
                    <td>
                        <a href="{{ route('author.show', ['id' => $author['id']]) }}"
                            class="badge text-bg-success text-white">Detail</a>
                        <a href="{{ route('author.edit', ['id' => $author['id']]) }}"
                            class="badge text-bg-warning text-white">Edit</a>
                        <a href="{{ route('author.delete', ['id' => $author['id']]) }}"
                            class="badge text-white text-bg-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
