<!-- URL DE MENUS -->

<!-- TODOS -->
<li id="home"><a href="/">Home</a></li>
<li id="sobre"><a href="{{route('sobre')}}">Sobre</a></li>
<li id="admin"><a href="{{route('admin.index')}}">Administração</a></li>
<!-- TODOS -->
@if(Auth::guest())
<!-- APENAS NÃO LOGADO -->
<li id="login"><a href="/login">Entrar</a></li>
<!-- APENAS NÃO LOGADO -->
@else
<!-- APENAS LOGADO -->
<li>{{Auth::user()->name}}</li>
<li id="logout"><a href="{{ route('logout')}}">Sair</a></li>
<!-- APENAS LOGADO -->
@endif