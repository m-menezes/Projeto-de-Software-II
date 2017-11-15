@extends('template.template')

@section('conteudo')
<div class="row">
	<div class="container">
		<div class="center">
			<h4>Suas Postagens</h4>
		</div>
		<div class="postagens">
			@foreach($registros as $registro)
			<div class="col s12 blue-grey lighten-5 border_lighten">
				<div class="col s12 m10">
					<div class="col s12 m8">
						<p class="admin_normal titulo">{{ $registro->titulo }}</p>
						<p class="admin_normal descricao">{{ str_limit($registro->descricao, $limit = 150, $end = '...')}}</p>
						<div class="col s12 m6 nopad">
							<p class="admin_small"><span>Data de Criação: </span>{{$registro->created_at->format('d/m/Y')}}</p>
						</div>
						<div class="col s12 m6 nopad">
							<p class="admin_small"><span>Última Atualização: </span>{{$registro->updated_at->format('d/m/Y')}}</p>
						</div>
					</div>
					<div class="col s12 m4">
						<p class="admin_small"><span>Criado por: </span>{{ $registro->criado }}</p>
						<p class="admin_small"><span>Email: </span>{{ $registro->email }}</p>
						<p class="admin_small"><span>Carga Horária: </span>{{$registro->carga_horaria}}</p>
						<p class="admin_small"><span>Valor: </span>{{$registro->valor}}</p>
						<p class="admin_small publicado">Publicado:
							@if ($registro->publicado == 'sim')
								<span class="sim">SIM</span>
							@else
								<span class="nao">NÃO</span>
							@endif
						</p>

						

					</div>
				</div>
				<div class="col s12 m2">
					<a class="admin_controles btn blue-grey lighten-2 col s12" href="{{route('admin.editar', $registro->id)}}"">Editar</a>
					<a class="admin_controles btn blue-grey darken-4 col s12" href="{{route('admin.deletar', $registro->id)}}"">Deletar</a>
				</div>
			</div>
			@endforeach
		</div>
		<div>
			<a class="btn blue" href="{{route('admin.adicionar')}}">Novo</a>
		</div>		
	</div>
</div>
@endsection