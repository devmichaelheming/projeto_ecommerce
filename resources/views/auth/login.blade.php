<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>
<body>
    {{-- <nav>
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}">
        </div>  
    </nav> --}}
    <div class="topo-login"></div>
    
    <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="header-login">
                <a href="{{route('index')}}">
                    <img src="{{ asset('img/logo2.png') }}">
                </a>
                <div class="title">LOGIN</div>
                <div class="linha-vertical" style="padding-bottom: 0;"><span></span></div>
                <div class="conteudo-login">
                  
                    <div class="group">      
                        <input type="text" name="email" id="email" class="email @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-Mail</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="password" id="password" class="password @error('password') is-invalid @enderror" required autocomplete="current-password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Senha</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if (session('mensagem'))
                        <div class="sacefull">
                            <div class="alert alert-success">
                                <span>
                                    <i class="far fa-check-circle" style="padding-right:0.5rem;"></i>
                                    {{ session('mensagem') }}
                                </span>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @elseif(session('invalido'))
                        <div class="alert alert-danger" style="margin: 0;">
                            <span>
                                <i class="far fa-check-circle" style="padding-right:0.5rem;"></i>
                                {{ session('invalido') }}
                            </span>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="button">
                    <button type="submit">Entrar</button>
                </div>
{{-- 
                <div class="info-login">
                    <div class="title-info">
                        Não é cadastrado ?
                    </div>
                    <a href="{{ route('register') }}">
                        <span>Cadastre-se aqui!</span>
                    </a>
                </div> --}}
            </div>
        </form>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
    <script>
        


    </script>
</body>
</html>