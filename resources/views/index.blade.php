@extends('template.template')

@section('conteudo')
<!-- CONTEUDO INTERNO SITE -->
@include('_includes.search')
<div class="row">
	<div class="container">
		<div class="postagens">
			@foreach($registros as $registro)
			<div class="col s12 blue-grey lighten-5 border_lighten">
				<div class="col s12 m12">
					<div class="col s12 m8">
						<p class="admin_normal titulo">{{ $registro->titulo }}</p>
						<p class="admin_normal descricao">{{ $registro->descricao }}</p>
						<p class="admin_small"><span>Data de Criação: </span>{{$registro->created_at->format('H:i d/m/Y')}}</p>
					</div>
					<div class="col s12 m4">
						<p class="admin_small"><span>Criado por: </span>{{ $registro->criado }}</p>
						<p class="admin_small"><span>Email: </span>{{ $registro->email }}</p>
						<p class="admin_small"><span>Carga Horária: </span>{{$registro->carga_horaria}}</p>
						<p class="admin_small"><span>Valor: </span>{{$registro->valor}}</p>
						<button class="btn blue col s12">Enviar email</button>
					</div>
				</div>
			</div>
			@endforeach
		</div>	
	</div>
</div>
<!-- CONTEUDO INTERNO SITE -->
@endsection

