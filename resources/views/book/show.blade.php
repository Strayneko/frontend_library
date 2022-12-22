{{-- inject carbon service --}}
@inject('carbon', 'Illuminate\Support\Carbon')

@extends('templates.base')

@section('title', 'Detail - ' . $book['title'])

@section('content')
    <h1 class="my-4">Detail Buku</h1>


    <div class="card  col-md-4">
        <div class="bg-image hover-overlay ripple mx-auto" data-mdb-ripple-color="light">
            <img src="{{ $book['image'] }}" class="img-fluid" style="height: 376px" />
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
        </div>

        <div class="card-body text-center">
            <h5 class="card-title">{{ $book['title'] }}</h5>
            <p class="card-text">
                {{ $book['description'] }}
            </p>

        </div>

        <div class="card-footer">
            <h5 class="card-text">Informasi Buku</h5>
            <table>
                <tr>
                    <td>
                        Penulis
                    </td>
                    <td>
                        : {{ $book['author']['name'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Genre
                    </td>
                    <td>
                        : {{ $book['category']['name'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Jenis Buku
                    </td>
                    <td>
                        : {{ $book['type'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Batas Usia
                    </td>
                    <td>
                        : {{ $book['category']['age_rating'] }}+
                    </td>
                </tr>

                <tr>
                    <td>
                        Bahasa
                    </td>
                    <td>
                        : {{ $book['book_language'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Total Halaman
                    </td>
                    <td>
                        : {{ $book['total_pages'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        No Isbn
                    </td>
                    <td>
                        : {{ $book['isbn'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Publisher
                    </td>
                    <td>
                        : {{ $book['publisher'] }}
                    </td>
                </tr>



            </table>

            <a href="{{ route('book.index') }}" class="btn btn-warning my-3">Kembali</a>
        </div>
    </div>
@endsection
