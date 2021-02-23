@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <br>
                <br>
                <img src="{{asset('img/front.png')}}" class="rounded mx-auto d-block" width="500px" height="300px" alt="">
                <br>
                <h1 class="text-warning font-italic font-weight-bold text-center">| Backend |</h1>
                <br>
                <p class="text-light font-weight-bold text-center">Za Backend aplikacije korišten je Laravel PHP framework koji koristi svoje auth i blade alate za kreiranje autentifikacije korisnika i povezivanje na bazu podataka naravno sa Xampp-om i MySQL-om. Aplikacija sadrži real time registraciju i prijavu u bazu podataka na siguran način te omogućava korisniku dodavanje, a vlasniku aplikacije i brisanje korisnika. Svi podaci korisnika su zaštičeni, dok je lozinka zaštičena pomoću hash-a. </p>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card shadow sm-3" style="width: 22rem;">
                    <img class="card-img-top" src="https://instagram.fsjj1-1.fna.fbcdn.net/v/t51.2885-19/s150x150/72310531_395226067813738_8173975496237776896_n.jpg?_nc_ht=instagram.fsjj1-1.fna.fbcdn.net&_nc_ohc=XD_ZwvrQER8AX9vVyl0&tp=1&oh=6d6de016864b4358bd0ad2da3a4f6a84&oe=60591CF8" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-center">Ivan Mišković</h5>
                        <p class="card-text text-center">Student dolazi iz Viteza, rođen 29.lipnja.1998. Ima želju da stekne visoko znanje o programiranju i animiranju kreiranjem web aplikacija i različitih animacija.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item font-weight-bold text-center">FPMOZ [Mostar]</li>
                        <li class="list-group-item font-weight-bold text-center">Gimnazija Katolički školski centar Petar Barbarić [Travnik]</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="https://www.instagram.com/ivanmiskovic5/" class="card-link">
                            <img src="https://i.pinimg.com/originals/71/72/16/7172161b580470deb78078669236d2c1.jpg" width="30px" height="30px" alt="instagram">
                        </a>
                        <a href="https://github.com/ivanmiskovic5" class="card-link">
                            <img src="http://pngimg.com/uploads/github/github_PNG40.png" width="30px" height="30px" alt="github">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <br>
                <br>
                <h1 class="text-warning font-italic font-weight-bold text-center">| Frontend |</h1>
                <br>
                <p class="text-light font-weight-bold text-center">Za Frontend aplikacije korištena je tehnologija Vue js. Uz pomoć Vue js-a izgrađeni su nesumična hrana generator i također izborni meni koji se pretraživa ukucavanjem imena hrane za koju smo zainteresovani. Korištene su također tehnologije poput bootstrap 4 kao i css, html, te klasični java script za dorađivanje i uljepšavanje aplikacije.</p>
                <br>
                <img src="{{asset('img/back.png')}}" class="rounded mx-auto d-block" width="300px" height="300px" alt="">
            </div>
        </div>
    </div>
    <info></info>

    <style>
        
    </style>
@endsection