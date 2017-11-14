<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}}</title>
	<!--Import Google Icon Font-->
	<link href="/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf_token" content="{ csrf_token() }" />
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<div class="menu">
		<nav>
			<div class="nav-wrapper azul-3">
				<div class="container" id="menu">
					<div class="col m12">
						<a href="/" class="brand-logo">{{config('app.name')}}</a>
						<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
						<ul class="right hide-on-med-and-down">
							@include('_includes.menu_url')
						</ul>
						<ul class="side-nav" id="mobile">
							@include('_includes.menu_url')
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<div class="content">
		@yield('conteudo')
	</div>
	<footer>
		<div class="row azul-3 nomargin">
			<div class="container">
				<div class="col m12 margin_top_large margin_bottom_large">
					<div class="col s12 m4 footer">
						<div class="footer_title">
							<p>Mapa do Site</p>
						</div>
						<ul class="mapa_site">
							@include('_includes.menu_url')
						</ul>
					</div>
					<div class="col s12 m4 footer">
						<div class="footer_title">
							<p>Contato</p>
						</div>
						<p>Universidade Federal de Santa Maria</p>
					</div>
					<div class="col s12 m4 footer">
						<div class="footer_title">
							<p>Universidade Federal de Santa Maria</p>

						</div>
						<a href="http://site.ufsm.br/" ><img src="/img/ufsm-linha-branco.png"></a>
					</div>
					<!-- COPYRIGHT -->
					<div class="col m12 footer_copyright">
						<div class="col m6 s12 footer_1">
							<p>{{config('app.name')}}</p>
						</div>
						<div class="col m6 s12 footer_2">
							<p>Alan Naidon || Marcelo Menezes</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	<!--Import highcharts.js-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="{{ asset('js/Script.js') }}"></script>
	<script type="text/javascript">
   	$.ajaxSetup({
      	headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    	});
	</script>
	</script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
		$('select').material_select();

		$(document).ready(function() {
			var baseUrl = '/';                
			switch ($(location).attr('pathname')) {
				// MENU PADRAO
				case ('/'):
				$("#home").addClass('active');
				break;
				case ('/admin/index'):
				$("#painel_visualizar").addClass('active');
				$("#admin").addClass('active');
				break;
				case ('/admin/adicionar'):
				$("#painel_add_postagem").addClass('active');
				$("#admin").addClass('active');
				break;
				case ('/login'):
				$("#login").addClass('active');
				break;
				case ('/sobre'):
				$("#sobre").addClass('active');
				break;
				case ('/logout'):
				$("#logout").addClass('active');
				break;                 
			}
		});
		@yield('script')
	</script>
</body>
</html>


