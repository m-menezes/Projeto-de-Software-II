<!-- URL DE MENUS -->

<!-- TODOS -->
<li class="active"><a href="/">Home</a></li>
<li><a href="{{route('admin.bolsa')}}">Administração</a></li>
<!-- TODOS -->


@if(Auth::guest())
<!-- APENAS NÃO LOGADO -->


<li><a href="/login">Entrar</a></li>



<!-- APENAS NÃO LOGADO -->
@else
<!-- APENAS LOGADO -->


<li>{{Auth::user()->name}}</li>
<li><a href="/logout">Sair</a></li>

<!-- APENAS LOGADO -->
@endif
