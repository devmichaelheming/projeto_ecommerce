{{-- MENU DE NAVEGAÇÃO --}}
<nav>
    <div class="header">
        {{-- <div class="logo">
            <a href="{{ route('index') }}">
                
            </a>
        </div> --}}
        <button onclick="menu_categories()" class="button-more">
            <i class="fas fa-list-ul"></i>
            <img src="{{ asset('img/logo2.png') }}" style="height: 3rem;padding-left:2.5rem;">
        </button>
    
        <div class="profile">

            <button type="submit modal-dropdown" onclick="dropdown()">
                <i class="fas fa-chevron-down"></i>

                Olá, seja bem vindo {{ Auth::user()->name }}!

                {{-- @if ($data['avatar'] == null) --}}
                    <div class="avatar-img" style="background-image: url('{{ asset('img/user2.png') }}')"></div>
                {{-- @elseif(session()->get('tipo') == "facebook")
                    <div class="avatar-img" style="background-image: url('{{ session()->get('avatar') }}')"></div>
                @else
                    <div class="avatar-img" style="background-image: url('data:image/{{$data['ext_img']}};base64,{{$data['avatar']}}')"></div>
                @endif --}}
            </button>
            
            <div class="modal-dropdown2">
                <div class="header-modal-dropdown2">
                    {{ Auth::user()->email }}
                </div>
                <div class="linha-vertical" style="width:80%;">
                    <span>
                    </span>
                </div>
                <a href="{{ route('page.clientes') }}">
                    <i class="far fa-address-card"></i>
                    Meu dados
                </a>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </div>

        </div>
    </div>
</nav>