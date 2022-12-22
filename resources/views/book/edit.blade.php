@extends('templates.base')
@section('title', 'Tambah data buku')
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



    <h1 class="my-4">Edit data buku</h1>
    <form action="{{ route('book.update', ['id' => $book['id']]) }}" method="post" class="col-md-5"
        enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-3">
            <input type="text" id="title" name="title" class="form-control"
                value="{{ old('title', $book['title']) }}" required autofocus />
            <label class="form-label" for="title">Judul</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="book_language" name="book_language" class="form-control"
                value="{{ old('book_language', $book['book_language']) }}" required />
            <label class="form-label" for="book_language">Bahasa</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="type" name="type" placeholder="ex: Manga" class="form-control"
                value="{{ old('type', $book['type']) }}" required />
            <label class="form-label" for="type">Jenis Buku</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="publisher" name="publisher" class="form-control"
                value="{{ old('publisher', $book['publisher']) }}" required />
            <label class="form-label" for="publisher">Penerbit</label>
        </div>

        <div class="form-outline mb-3">
            <input type="date" id="published_at" name="published_at" class="form-control"
                value="{{ old('published_at', $book['published_at']) }}" required />
            <label class="form-label" for="published_at">Tanggal Terbit</label>
        </div>

        <div class="form-outline mb-3">
            <input type="number" maxlength="13" id="isbn" name="isbn" class="form-control"
                value="{{ old('isbn', $book['isbn']) }}" required />
            <label class="form-label" for="isbn">Isbn</label>
        </div>

        <div class="form-outline mb-3">
            <input type="number" maxlength="9999" id="total_pages" name="total_pages" class="form-control"
                value="{{ old('total_pages', $book['total_pages']) }}" required />
            <label class="form-label" for="total_pages">Jumlah Halaman</label>
        </div>

        <div class="form-outline mb-3">
            <textarea type="text" id="description" name="description" class="form-control" required>{{ old('description', $book['description']) }}</textarea>
            <label class="form-label" for="description">Deskripsi/Sinopsis</label>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label" for="author">Author</label>
            <select class="form-select" name="author_id" id="author">
                <option value="">Pilih Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author['id'] }}" @if ($author['id'] == $book['author_id']) selected @endif>
                        {{ $author['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label" for="category">Kategori/Genre</label>
            <select class="form-select" name="category_id" id="category">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @if ($category['id'] == $book['category_id']) selected @endif>
                        {{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <label class="form-label" for="image">Gambar</label>
        <input type="file" class="form-control mb-3" id="image" name="image" />

        <div class="mb-4">
            <button class="btn btn-success" type="submit">Edit</button>
            <a href="{{ route('book.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
@endsection
