
<div class="col s12 m2 nopad">
	<div class="painel azul-3">
			<div class="col s12 azul-3 circle" id="userFoto">
				<?php if (Auth::user()->foto) {
					echo '<div class="fotoUsuario"></div>';
				}
				else{
					echo '<i class="material-icons">account_circle</i>';
				}?>
			</div>
		<nav>
			<ul>
				<li class="col s12">{{Auth::user()->name}}</li>
				<li class="col s12" id="userEmail">{{Auth::user()->email}}</li>
				<hr>
				<li id="painel_name">
					<a href="{{route('edit_name')}}">Alterar Dados<i class="material-icons right">person_pin</i></a>
				</li>
				<li id="painel_password">
					<a href="{{route('edit_pass')}}">Alterar Senha<i class="material-icons right">lock_outline</i></a>
				</li>
			</ul>
			<hr>
			<ul>
				<li id="painel_visualizar">
					<a href="{{route('admin.index')}}">Minhas Postagens<i class="material-icons right">dehaze</i></a>
				</li>
				<li id="painel_add_postagem">
					<a href="{{route('admin.adicionar')}}">Criar Postagem<i class="material-icons right">library_add</i></a>
				</li>
				<li id="painel_add_area">
					<a href="{{route('admin.novaArea')}}">Criar Area<i class="material-icons right">library_add</i></a>
				</li>
				<li id="painel_add_curso">
					<a href="{{route('admin.novoCurso')}}">Criar Curso<i class="material-icons right">library_add</i></a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<style type="text/css">
	.fotoUsuario{
		background-image: url(/storage/app/public/fotos/<?php echo Auth::user()->foto; ?>);
	}
	#userEmail{
		font-size: 1.3vh;
		overflow: hidden;
		height: 40px;
	}
</style>

