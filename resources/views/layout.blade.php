<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Albums</title>
        
        <link rel="stylesheet" href="/css/app.css">        
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Prosta Galeria Zdjęć</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="/albums">Lista Albumów</a></li>
                <li><a href="/albums/create">Nowy Album</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <div class="container">
          <div class="flash-message">
            @if(Session::has('message') and Session::has('alert-'))
            <p class="alert alert-{{ Session::get('alert-') }}">{{ Session::get('message') }}</p>
            @endif
          </div>
          @yield('content')
        </div>
    </body>
</html>