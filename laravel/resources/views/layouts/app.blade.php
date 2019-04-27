<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Modulos <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('empresas.index') }}">
                                    Empresas
                                </a>
                                <a class="dropdown-item" href="{{ route('empleados.index') }}">
                                    Empleados
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <div class="clearfix"></div>

            @include('flash::message')
            
            <div class="clearfix"></div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>

    <script>

var _URL = window.URL || window.webkitURL;

function isSupportedBrowser() {
    return window.File && window.FileReader && window.FileList && window.Image;
}

function getSelectedFile() {
    var fileInput = document.getElementById("logo");
    var fileIsSelected = fileInput && fileInput.files && fileInput.files[0];
    if (fileIsSelected)
        return fileInput.files[0];
    else
        return false;
}

function isGoodImage(file) {
    var deferred = jQuery.Deferred();
    var image = new Image();

    image.onload = function() {
        // Check if image is bad/invalid
        if (this.width + this.height === 0) {
            this.onerror();
            return;
        }

        // Check the image resolution
        if (this.width >= 400 && this.height >= 400) {
            deferred.resolve(true);
        } else {
            alert("imagen con baja resolucion");
            deferred.resolve(false);
        }
    };

    image.onerror = function() {
        alert("imagen invalida");
        deferred.resolve(false);
    }

    image.src = _URL.createObjectURL(file);

    return deferred.promise();
}
window.onload = function() {
$("#myform").submit(function(event) {
    var form = this;

    if (isSupportedBrowser()) {
        event.preventDefault(); //Stop the submit for now

        var file = getSelectedFile();
        if (!file) {
            alert("elige una imagen");
            return;
        }

        isGoodImage(file).then(function(isGood) {
            if (isGood)
                form.submit();
        });
    }
});
}

    </script>
</html>
