@extends('templates.base')

@section('title', 'Detail - ' . $author['name'])

@section('content')
    <h1 class="my-4">Detail Author</h1>


    <div class="card  col-md-4">
        <div class="bg-image hover-overlay ripple mx-auto" data-mdb-ripple-color="light">
            <img src="{{ $author['photo'] }}" class="img-fluid" style="height: 376px" />
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
        </div>

        <div class="card-body text-center">
            <h5 class="card-title">{{ $author['name'] }}</h5>
            <p class="card-text">
                {{ $author['bio'] }}
            </p>

        </div>

        <div class="card-footer">
            <h5 class="card-text">Informasi Author</h5>
            <table>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        : {{ $author['address'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        : {{ $author['birth_date'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        : {{ $author['gender'] == 0 ? 'Perempuan' : 'Laki - Laki' }}
                    </td>
                </tr>

                <tr>
                    <td>
                        No Hp
                    </td>
                    <td>
                        : {{ $author['phone_number'] }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        : {{ $author['email'] }}
                    </td>
                </tr>


            </table>

            <a href="{{ route('author.index') }}" class="btn btn-warning my-3">Kembali</a>
        </div>
    </div>
@endsection
