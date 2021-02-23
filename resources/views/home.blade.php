@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white text-center"><strong>{{ __('Status') }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="{{asset('img/prijava.png')}}" class="rounded mx-auto d-block" width="500px" height="300px" alt="">
                </div>
            </div>
            
            @vlasnik
            <hr>
            <div class="card">
                <div class="card-header bg-info text-white text-center"><strong>{{ __('Korisnici') }}<strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#addUsersModal">
                        Dodajte korisnika!
                    </button>

                    <table class="col-md-12 table-bordered shadow lg-5">
                        <tr>
                            <th>#ID</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>JMBG</th>
                            <th>E-mail</th>
                            <th>Uloga</th>
                            <th>Datum i vrijeme registracije</th>
                            <th>Brisanje</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->surname }}</th>
                            <th>{{ $user->oid }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->role }}</th>
                            <th>{{ $user->created_at }}</th>
                            <td>
                                <a href="{{ route("users.delete", $user->id)}}" class= "btn btn-danger">Obriši</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <div class="modal @error('name') modal-open @enderror fade" id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <form id="addUsersForm" method="POST" action="{{ route('users.add') }}">
                            @csrf
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Dodavanje korisnika</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Ime</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Unesite ime korisnika">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Prezime</label>
                                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname" placeholder="Unesite prezime korisnika">
                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="oid">JMBG</label>
                                        <input type="text" class="form-control @error('oid') is-invalid @enderror" name="oid" id="oid" placeholder="Unesite JMBG korisnika">
                                        @error('oid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Unesite E-mail korisnika">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Lozinka</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Unesite lozinku korisnika">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Ponovite lozinku</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Ponovo unesite lozinku">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                    <button id = "addUserBtn" type="submit" class="btn btn-primary">Spremi</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endvlasnik
        </div>
    </div>
</div>
@endsection
