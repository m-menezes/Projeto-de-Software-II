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
							<p>projetodesoftware@contato.com</p>
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
		</script>
	</body>
	</html>