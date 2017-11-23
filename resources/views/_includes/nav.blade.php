<nav>
	<div class="nav-wrapper azul-3">
		<div class="container">
			<a href="/" class="brand-logo"><img src="/img/logo-oport.png"><span>{{config('app.name')}}</span></a>
			<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li id="home"><a href="/">Página Inicial</a></li>
				<li id="sobre"><a href="{{route('sobre')}}">Formulário</a></li>
				@guest
				<!-- APENAS NÃO LOGADO -->
				<li id="login"><a href="{{route('login')}}">Entrar</a></li>
				@else
				<!-- APENAS LOGADO -->
				<li id="admin"><a href="{{route('admin.index')}}">Administração</a></li>
				<li id="logout"><a class="modal-trigger" href="#modalLogout"><i class="material-icons right">exit_to_app</i>Sair</a></li>
				@endguest
			</ul>
			<ul class="side-nav" id="mobile">
				<li id="home"><a href="/">Página Inicial</a></li>
				<li id="sobre"><a href="{{route('sobre')}}">Formulário</a></li>
				@guest
				<!-- APENAS NÃO LOGADO -->
				<li id="login"><a href="{{route('login')}}">Entrar</a></li>
				@else
				<!-- APENAS LOGADO -->
				<li id="admin"><a href="{{route('admin.index')}}">Administração</a></li>
				<li id="logout"><a class="modal-trigger" href="#modalLogout"><i class="material-icons right">exit_to_app</i>Sair</a></li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
<!-- Modal Sair -->
<div id="modalLogout" class="modal">
	<div class="modal-content">
		<div class="row nomargin">
			<div class="col s12">
				<h4>Sair</h4>
				<a class="btn col s12 m5 modal-close">Não</a>
				<a class="btn col s12 m5 cinza-2 right nomargin" href="{{route('logout')}}">Sim</a>
			</div>
		</div>
	</div>
</div>