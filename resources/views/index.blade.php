<?PHP session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-COMMERCE</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/anji.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.core.css') }}">
    <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.theme.css') }}"> --}}
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>

<body>
    {{-- MENU DE NAVEGAÇÃO --}}
    <nav>
        <div class="header">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.png') }}" id="logo1">
                    <img src="{{ asset('img/logo22.png') }}" id="logo2">
                </a>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
           
            <div class="rs">
                <span>
                    <i class="fab fa-facebook-f"></i>
                </span>
                <span>
                    <i class="fab fa-whatsapp"></i>
                </span>
                <span>
                    <i class="fab fa-instagram"></i>
                </span>
                <span>
                    <i class="fab fa-twitter"></i>
                </span>
            </div>
     
            @if (session()->get('name'))
                <div class="profile">
                    <button type="submit modal-dropdown" onclick="dropdown()">
                        <i class="fas fa-chevron-down"></i>

                        @if (session()->get('tipo') == 'login')
                            {{ session()->get('usuario') }}
                        @else
                            {{ session()->get('name') }}
                        @endif

                        @if ($data['avatar'] == null)
                            <div class="avatar-img" style="background-image: url('{{ asset('img/user2.png') }}')"></div>
                        @elseif(session()->get('tipo') == "facebook")
                            <div class="avatar-img" style="background-image: url('{{ session()->get('avatar') }}')"></div>
                        @else
                            <div class="avatar-img" style="background-image: url('data:image/{{$data['ext_img']}};base64,{{$data['avatar']}}')"></div>
                        @endif
                    </button>
                    
                    <div class="modal-dropdown2">
                        <div class="header-modal-dropdown2">
                            @if (session()->get('tipo') == 'login')
                                Olá, seja bem vindo {{ session()->get('usuario') }}!
                            @else
                                Olá, seja bem vindo {{ session()->get('name') }}!
                            @endif
                        </div>
                        <div class="linha-vertical" style="width:80%;">
                            <span>
                            </span>
                        </div>
                        <a href="{{ route('page.clientes') }}">
                            <i class="far fa-address-card"></i>
                            Meu dados
                        </a>
                        <a href="{{ route('page.clientes') }}">
                            <i class="fas fa-heart"></i>
                            Favoritos
                        </a>
                        <a href="{{ route('page.clientes') }}">
                            <i class="fas fa-shopping-cart"></i>
                            Carrinho
                        </a>
                        <a href="{{ route('page.clientes') }}">
                            <i class="far fa-comment-dots"></i>
                            Notificações
                        </a>
                        <a href="{{ route('logout.login') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </a>
                    </div>
                </div>
            @else
             <div class="menu-login">
                    <a href="{{ route('index.login') }}">
                        <i class="far fa-user"></i>
                        <span>Entrar</span>
                    </a>
                </div>
             @endif
        </div>
        <div class="sub-header">
            <div class="more-categories">
                <button onclick="menu_categories()" class="button-more">
                    <i class="fas fa-list-ul"></i>
                
                    Mostrar mais categorias
                </button>
                <div class="menu-left-categories">
                    <ul id="nav">
                        <li><a href="#">
                                <span><i class="fas fa-male"></i> Homem</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Camiseta</a></li>
                                <li><a href="#">Tênis</a></li>
                                <li><a href="#">Calça</a></li>
                                <li><a href="#">Boné</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-male"></i> Mulher</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Sapato</a></li>
                                <li><a href="#">Acessorios</a></li>
                                <li><a href="#">Maquiagem</a></li>
                                <li><a href="#">Camisa</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-child"></i> Crianças</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Brinquedos</a></li>
                                <li><a href="#">Camisas</a></li>
                                <li><a href="#">Tênis</a></li>
                                <li><a href="#">Shorts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-desktop"></i> Eletronicos</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Teclado</a></li>
                                <li><a href="#">Mouse</a></li>
                                <li><a href="#">Notebook</a></li>
                                <li><a href="#">Smartphone</a></li>
                            </ul>
                        </li>
                        <li><a href="#">
                                <span><i class="fas fa-male"></i> Homem</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Camiseta</a></li>
                                <li><a href="#">Tênis</a></li>
                                <li><a href="#">Calça</a></li>
                                <li><a href="#">Boné</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-male"></i> Mulher</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Sapato</a></li>
                                <li><a href="#">Acessorios</a></li>
                                <li><a href="#">Maquiagem</a></li>
                                <li><a href="#">Camisa</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="#">
                                <span><i class="fas fa-child"></i> Crianças</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Brinquedos</a></li>
                                <li><a href="#">Camisas</a></li>
                                <li><a href="#">Tênis</a></li>
                                <li><a href="#">Shorts</a></li>
                            </ul>
                        </li>
                          <li>
                            <a href="#">
                                <span><i class="fas fa-desktop"></i> Eletronicos</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <ul>
                                <li><a href="#">Teclado</a></li>
                                <li><a href="#">Mouse</a></li>
                                <li><a href="#">Notebook</a></li>
                                <li><a href="#">Smartphone</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
               
            </div>
            <div class="menu-categories">
                <a href="http://"><i class="fas fa-male"></i> Homem</a>
                <a href="http://"><i class="fas fa-female"></i> Mulher</a>
                <a href="http://"><i class="fas fa-child"></i> Crianças</a>
                <a href="http://"><i class="fas fa-desktop"></i> Eletronicos</a>
            </div>
        </div>
    </nav>

    {{-- CARROSEL DE BANNERS --}}
    {{-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/banner01.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner02.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner03.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> --}}

    {{-- CATEGORIAS --}}
    <div class="categorias">
        <div class="title-destaques">
            <span>CATEGORIAS</span>
            <div class="linha-vertical"><span></span></div>
        </div>
        <div class="bloco-categorias">
            <span>
                <i class="fas fa-couch"></i>
                MÓVEIS
            </span>

            <span>
                <i class="fas fa-desktop"></i>
                ELETRONICOS
            </span>

            <span>
                <i class="fas fa-tshirt"></i>
                ROUPAS
            </span>

            <span>
                <i class="fas fa-tshirt"></i>
                ROUPAS
            </span>

            <span>
                <i class="fas fa-desktop"></i>
                ELETRONICOS
            </span>

            <span>
                <i class="fas fa-tshirt"></i>
                ROUPAS
            </span>

            <span>
                <i class="fas fa-desktop"></i>
                ELETRONICOS
            </span>

            <span>
                <i class="fas fa-couch"></i>
                MÓVEIS
            </span>

            <span>
                <i class="fas fa-couch"></i>
                MÓVEIS
            </span>

            <span>
                <i class="fas fa-tshirt"></i>
                ROUPAS
            </span>

            <span>
                <i class="fas fa-couch"></i>
                MÓVEIS
            </span>

            <span>
                <i class="fas fa-tshirt"></i>
                ROUPAS
            </span>
        
            <span>
                <i class="fas fa-mobile-alt"></i>
                SMARTPHONE
            </span>

            <span>
                <i class="fas fa-futbol"></i>
                ESPORTES
            </span>
        </div>
                  
    </div>

    {{-- DESTAQUES DA SEMANA --}}
    <div class="destaques">
        <div class="title-destaques">
            <span>DESTAQUES DA SEMANA</span>
            <div class="linha-vertical"><span></span></div>
        </div>
        <div class="destaques-interno">
            
            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/roupa01.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/roupa02.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/roupa03.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/roupa04.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>

     {{-- ANUNCIOS --}}
    <div class="ads">
        <img src="{{ asset('img/ads.png') }}">
        <img src="{{ asset('img/ads2.png') }}">
    </div>
    {{-- <div class="ads">
        <img src="{{ asset('img/ads2.png') }}">
    </div> --}}

    {{-- MAIS VENDIDOS --}}
    <div class="destaques">
        <div class="title-destaques">
            <span>MAIS VENDIDOS</span>
            <div class="linha-vertical"><span></span></div>
        </div>
        <div class="destaques-interno">

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item2.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item3.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="#" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            {{-- <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item2.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a> --}}

             {{-- <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item3.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a> --}}

            {{-- <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item2.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item3.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="oferta-item">
                    <div class="oferta-header">
                        <div class="bg">
                            <img src="{{ asset('img/item.webp') }}" alt="" srcset="">
                            <span><i class="far fa-eye eye"></i></span>
                        </div>
                    </div>
                    <div class="oferta-body">
                        <div class="oferta-descricao">
                            iPhone 12 128GB Preto iOS 5G Wi-Fi Tela 6.1" Câmera - 12MP + 12MP - Apple
                        </div>
                        <div class="oferta-valor">
                            $ 10.900,00
                        </div>
                    </div>
                </div>
            </a> --}}

        </div>
       
    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-interno">
             <div class="rs-footer">
                <span>
                    <i class="fab fa-facebook-f"></i>
                </span>
                <span>
                    <i class="fab fa-whatsapp"></i>
                </span>
                <span>
                    <i class="fab fa-instagram"></i>
                </span>
                <span>
                    <i class="fab fa-twitter"></i>
                </span>
            </div>
        </div>
        <div class="footer-bottom">
            <span>TODOS OS DIREITOS RESERVADOS</span>
        </div>
    </footer>

    <div class="popup">
        <div class="whats">
            <a href="https://api.whatsapp.com/send?phone=5566997177126&text=Olá, gostaria de tirar algumas duvidas!">
                <i class="fab fa-whatsapp"></i>
                <span>Converse conosco!</span>
            </a>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js') }}" ></script>
    <script src="{{ asset('js/anijs-min.js') }}"></script>
    <script src="{{ asset('js/anijs-helper-scrollreveal.js') }}"></script>
<script>
                
        $(".oferta-header").mouseover(function(){
            $(this).find(".eye").css('opacity', '1');
            $(this).find(".eye").css('transition', '0.2s linear');
            $(this).find(".bg").addClass('filter');
        });
        $(".oferta-header").mouseout(function(){
            $(this).find(".eye").css('opacity', '0');
            $(this).find(".eye").css('transition', '0.2s linear');
            $(this).find(".bg").removeClass('filter');
        });
        
        $(document).ready(function(){
            $(window).scroll(function(){
                if (this.scrollY > 80) {
                    $("nav .header").addClass("sticky");
                    $("nav .header span").addClass("sticky-i");
                    $("nav .header a").addClass("sticky-i");
                    $("nav .sub-header").addClass("sticky");
                    $("nav .sub-header a").addClass("sticky-i");
                    $("nav .sub-header button").addClass("sticky-i");
                    $("#logo2").css("display", "block");
                    $("#logo1").css("display", "none");
                } else {
                    $("nav .header").removeClass("sticky");
                    $("nav .header span").removeClass("sticky-i");
                    $("nav .header a").removeClass("sticky-i");
                    $("nav .sub-header").removeClass("sticky");
                    $("nav .sub-header a").removeClass("sticky-i");
                    $("nav .sub-header button").removeClass("sticky-i");
                    $("#logo2").css("display", "none");
                    $("#logo1").css("display", "block");
                }
            });
        });

        function dropdown(){
            $('.modal-dropdown2').toggleClass('active-drop')
            $('.fa-chevron-down').toggleClass('rotate-icon')
        }
        
        function menu_categories(){
            $('.menu-left-categories').toggleClass('menu-categories-active')
        }

        $(".menu-left-categories ul li a").mouseover(function(){
            $(this).find(".menu-left-categories ul li a span").addClass('drop-color');
        });
        $(".menu-left-categories ul li a").mouseout(function(){
            $(this).find(".menu-left-categories ul li a span").removeClass('drop-color');
        });

    </script>
</body>
</html>