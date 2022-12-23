@extends('templates.base')
@section('title', 'Edit kategori')
@section('content')

    {{-- feedback message --}}
    {{-- if there is an error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-4 col-md-5" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{ $error }}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <h1 class="my-4">Edit kategori</h1>
    <form action="{{ route('category.update', ['id' => $category['id']]) }}" method="post" class="col-md-5"
        enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-3">
            <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', $category['name']) }}" required autofocus />
            <label class="form-label" for="name">Nama</label>
        </div>

        <div class="form-outline mb-3">
            <input type="number" id="age_rating" name="age_rating" class="form-control"
                value="{{ old('age_rating', $category['age_rating']) }}" required autofocus />
            <label class="form-label" for="age_rating">Batas Usia</label>
        </div>


        <div class="form-outline mb-3">
            <textarea type="text" id="description" name="description" class="form-control" required>{{ old('description', $category['description']) }}</textarea>
            <label class="form-label" for="description">Deskripsi</label>
        </div>


        <label class="form-label" for="logo">Logo</label>
        <input type="file" class="form-control mb-3" id="logo" name="logo" />

        <div class="mb-4">
            <button class="btn btn-success" type="submit">Edit</button>
            <a href="{{ route('category.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
@endsection
