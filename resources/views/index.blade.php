@extends('template.template')

@section('conteudo')
<!-- CONTEUDO INTERNO SITE -->
<div class="margin_top_huge margin_bottom_huge">
	@include('_includes.search', ['areas' => $areas] )
	<div class="row">
		<div class="container">
			<div class="postagens">
				@foreach($registros as $registro)
				@if($registro->publicado == 'sim')
				<div class="col s12 blue-grey lighten-5 border_lighten postagem">
					<div class="col s12 m12 padding_normal">
						<div class="col s12 m6">
							<div class="admin_normal">
								<a href="{{route('postagem', $registro->id)}}">
									<h5>{{ $registro->titulo }}</h5>
								</a>
								<p>{{ str_limit($registro->descricao, $limit = 200, $end = '...')}}</p>
							</div>
						</div>
						<div class="col s12 m6">
							<div class="col s12 m6">
								<p class="admin_small margin_bottom_small">
									<span>Carga Horária: </span>
									{{$registro->carga_horaria}} Horas
								</p>
								<p class="admin_small margin_bottom_small margin_top_small">
									<span>Valor: </span>
									R$ {{$registro->valor}}
								</p>
							</div>
							<div class="col s12 m6">
								<p class="admin_small margin_bottom_small"><span>Centro:</span>{{ $registro->centro }}</p>
								<p class="admin_small margin_bottom_small margin_top_small"><span>Data de Publicação:</span>{{$registro->created_at->format('H:i - d/m/Y')}}</p>
								<a class="btn azul-3" href="{{route('postagem', $registro->id)}}"">Ver Detalhes</a>
							</div>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>	
		</div>
	</div>
</div>
<!-- CONTEUDO INTERNO SITE -->
@endsection

