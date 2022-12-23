@extends('templates.base')
@section('title', 'Tambah author')
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



    <h1 class="my-4">Tambah Author</h1>
    <form action="" method="post" class="col-md-5" enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-3">
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required
                autofocus />
            <label class="form-label" for="name">Nama</label>
        </div>

        <div class="form-outline mb-3">
            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date') }}"
                required autofocus />
            <label class="form-label" for="birth_date">Tanggal Lahir</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required
                autofocus />
            <label class="form-label" for="address">Alamat</label>
        </div>

        <div class="form-outline mb-3">
            <input type="number" id="phone_number" name="phone_number" class="form-control"
                value="{{ old('phone_number') }}" required autofocus />
            <label class="form-label" for="phone_number">No Hp</label>
        </div>

        <div class="form-outline mb-3">
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required
                autofocus />
            <label class="form-label" for="email">Email</label>
        </div>

        <div class="form-outline mb-3">
            <textarea type="text" id="bio" name="bio" class="form-control" required>{{ old('bio') }}</textarea>
            <label class="form-label" for="bio">Bio</label>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label" for="gender">Jenis Kelamnin</label>
            <select class="form-select" name="gender" id="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="0">Perempuan</option>
                <option value="1">Laki - Laki</option>
            </select>
        </div>


        <label class="form-label" for="photo">Foto</label>
        <input type="file" class="form-control mb-3" id="photo" name="photo" />

        <div class="mb-4">
            <button class="btn btn-success" type="submit">Tambah</button>
            <a href="{{ route('book.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
@endsection
