@extends('templates.base')
@section('title', 'Daftar Kategori')

@section('content')
    {{-- success message --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="my-4">Daftar Kategori</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-4">Tambah Kategori</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Batas Usia</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ $category['logo'] }}" alt="{{ $category['name'] }}" style="width: 70px">
                    </td>
                    <td>{{ $category['name'] }}</td>
                    <td>{{ $category['description'] }}</td>
                    <td>{{ $category['age_rating'] }}</td>
                    <td>
                        <a href="{{ route('category.edit', ['id' => $category['id']]) }}"
                            class="badge text-bg-warning text-white">Edit</a>
                        <a href="{{ route('category.delete', ['id' => $category['id']]) }}"
                            class="badge text-white text-bg-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
