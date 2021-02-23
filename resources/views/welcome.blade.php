@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="{{asset('img/im.png')}}" width="370px" height="200px" alt="logo">
            </div>
        </div>
    </div>
    <br>
    <hr>
    <glavna></glavna>
@endsection
