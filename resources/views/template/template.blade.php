<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}}</title>
	<!--Imports Font Google, Materialize e CSS Personalizado-->
	<link href="/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
	<!--End Imports-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
	<div class="menu">
		@include('_includes.nav')
	</div>
	<div class="content">
		@yield('conteudo')
	</div>
	<footer>
		<div class="row azul-3 nomargin">
			<div class="container">
				<div class="col m12 margin_top_large margin_bottom_large">
					<div class="col s12 m6 footer">
						<div class="footer_title">
							<p>Contato</p>
						</div>
						<p>Universidade Federal de Santa Maria</p>
					</div>
					<div class="col s12 m6 footer">
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
	<!--Import Materialize/Jquery-->
	<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/js/materialize.min.js"></script>
	<!--Import highcharts.js-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<script type="text/javascript">
		$('.dropdown-button').dropdown({
			inDuration: 400,
      		outDuration: 200,
			hover: true, // Activate on hover
			gutter: 0, // Spacing from edge
			constrainWidth: false,
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'right', // Displays dropdown with edge aligned to the left of button
			stopPropagation: false // Stops event propagation
		});
		$('.collapsible').collapsible();
		$(".button-collapse").sideNav();
		$('select').material_select();
		$('.modal').modal({
			dismissible: true // Modal can be dismissed by clicking outside of the modal
		});
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(document).ready(function() {
			var baseUrl = '/';                
			switch ($(location).attr('pathname')) {
				// MENU PADRAO
				case ('/'):
					$("#home").addClass('active');
					break;
				case ('/admin'):
					$("#painel_visualizar").addClass('active');
					$("#admin").addClass('active');
					break;
				case ('/admin/adicionar/postagem'):
					$("#painel_add_postagem").addClass('active');
					$("#admin").addClass('active');
					break;
				case ('/admin/adicionar/areas'):
					$("#painel_add_area").addClass('active');
					$("#admin").addClass('active');
					break;
				case ('/admin/adicionar/cursos'):
					$("#painel_add_curso").addClass('active');
					$("#admin").addClass('active');
					break;
				case ('/edit_pass'):
					$("#painel_password").addClass('active');
					$("#admin").addClass('active');
					break;
				case ('/edit_name'):
					$("#painel_name").addClass('active');
					$("#admin").addClass('active');
					break;                 
				case ('/login'):
					$("#login").addClass('active');
					break;
				case ('/sobre'):
					$("#sobre").addClass('active');
					break;
			}
		});
		@yield('script')
	</script>
</body>
</html>


