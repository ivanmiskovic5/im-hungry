<nav class="navbar navbar-expand-lg shadow lg-5 bg-light text-black-50 font-weight-bold font-italic">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('img/im.png')}}" width="120px" height="60px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/naruci') }}">Ponuda <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/random') }}">Nasumično</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Info
            </a>
            <div class="dropdown-menu shadow sm-3" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://drive.google.com/file/d/1X8Q9zwf53RRYlu1PZrwY5-wgUzkzmHWm/view?usp=sharing">Vizija</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="https://drive.google.com/file/d/1TajxS7SuRYlNNI7aJ4sAy8RP49szX0vc/view?usp=sharing">Diagram</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/info') }}">O meni</a>
            </div>
        </li>
        </ul>

        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                            
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Profil</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Odjava') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>


