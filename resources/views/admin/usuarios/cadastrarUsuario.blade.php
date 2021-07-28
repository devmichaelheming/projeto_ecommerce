<form class="form-horizontal" id="form" role="form" method="post" action="{{ route('usuarios.cadastrar')}}" enctype="multipart/form-data" >
	@csrf
	<div class="conteudo-login" style="padding: 0rem 0 0.5rem 0">
		{{-- <div class="bloco1"> --}}
			<div class="group-register" style="width:98%;">
				<div class="group">      
                    <input type="text" name="name" id="name" class="name" required autocomplete="off">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Usuario</label>
				</div>
			</div>
			<div class="group-register" style="width:98%;">
				<div class="group">      
					<input type="email" name="email" id="email" class="email" required autocomplete="off">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>E-Mail</label>
				</div>
			</div>
			<div class="group-register" style="width:98%;">
				<div class="group">      
					<input type="password" name="password" id="password" class="password" required autocomplete="off">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Senha</label>
				</div>
			</div>
        {{-- </div> --}}
	</div>

	<button type="submit" class="button-cadastrar">Cadastrar</button>
</form>
{{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
<script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
<script>

var options_cep = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['00000-000'],
            mask = (cpf.length > 14) ? masks[1] : masks[0];
        el.mask(mask, op);
    }
};

$('#cep').mask('00000-000', options_cep);

$('form#form').validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true
        },
        password: {
            required: true
        },
    }
})

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>