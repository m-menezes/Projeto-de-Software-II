		<footer>
			<div class="row blue-grey darken-4 nomargin">
				<div class="container">
					<div class="col m12 margin_top_large margin_bottom_large">
						<div class="col s12 m6 footer">
							<div class="footer_title">
								<p>Mapa do Site</p>
							</div>
							<ul class="mapa_site">
								@include('_includes.menu_url')
							</ul>
						</div>
						<div class="col s12 m6 footer">
							<div class="footer_title">
								<p>Contato</p>
							</div>
							<p>Universidade Federal de Santa Maria</p>
						</div>
						<!-- COPYRIGHT -->
						<div class="col m12 footer_copyright">
							<div class="col m6 s12 footer_1">
								<p>@include('_includes.title')</p>
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
		<script type="text/javascript">
			$(".button-collapse").sideNav();
			$('select').material_select();

			$(document).ready(function() {
				var baseUrl = '/';                

				switch ($(location).attr('pathname')) {
					// PAINEL ADMINISTRATIVO
					case ('/admin/index'):
					$("#painel_visualizar").addClass('active');
					$("#admin").addClass('active');
					break;
					case ('/admin/adicionar'):
					$("#painel_add_postagem").addClass('active');
					$("#admin").addClass('active');
					break;
					case ('/login'):
					$("#painel_add_centro").addClass('active');
					$("#admin").addClass('active');
					break; 
				}
			});
			$(document).ready(function() {
				window_size = $('.content').height();
				$('.m2>.painel').height(window_size);


				var baseUrl = '/';                
				switch ($(location).attr('pathname')) {
					// MENU PADRAO
					case ('/'):
					$("#home").addClass('active');
					break;
					case ('/admin/index'):
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
		</script>
	</body>
	</html>