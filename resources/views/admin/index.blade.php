@extends('template.template')

@section('conteudo')
<div class="row nomargin">
	<div class="col s12 m2 nopad">
		<div class="painel  blue-grey darken-3">
			@include('_includes.admin_painel')
		</div>
	</div>
	<div class="col s10">
		<div class="margin_left_large margin_right_large">
			<div class="col s12 m12 estatistica padding_large">
				<div class="col s12 m4">
					<p class="teal darken-1"><span>{{count($registros)}}</span>Postagens</p>
				</div>
				<div class="col s12 m4">
					<p class="teal darken-2"><span>{{$publicados}}</span>Publicados</p>
				</div>
				<div class="col s12 m4">
					<p class="red"><span>{{$naopublicados}}</span>Não Publicados</p>
				</div>
			</div>
			<div class="postagens">
				@foreach($registros as $registro)
				<div class="col s12 blue-grey lighten-5 border_lighten postagem">
					<div class="col s12 m12 padding_normal">
						<div class="col s12 m5">
							<div class="admin_normal">
								<h5>{{ $registro->titulo }}</h5>
								<p>{{ str_limit($registro->descricao, $limit = 200, $end = '...')}}</p>
							</div>
						</div>
						<div class="col s12 m7">
							<div class="col s12 m6">
								<p class="admin_small margin_bottom_small ">
									<span>Carga Horária: </span>
									{{$registro->carga_horaria}} Horas
								</p>
								<p class="admin_small margin_bottom_small margin_top_small">
									<span>Valor: </span>
									R$ {{$registro->valor}}
								</p>
								<p class="admin_small margin_bottom_small margin_top_small">
									<span>Email: </span>
									{{$registro->email}}
								</p>
							</div>
							<div class="col s12 m6">
								<p class="admin_small margin_bottom_small">
									<span>Data de Publicação:</span>
									{{$registro->created_at->format('H:i - d/m/Y')}}
								</p>
								<p class="admin_small margin_bottom_small margin_top_small">
									<span>Data de Atualização:</span>
									{{$registro->updated_at->format('H:i - d/m/Y')}}
								</p>
							</div>
						</div>
						<div class="col s12 m12 margin_top_normal margin_bottom_normal">
							<div class="col s12 m4">
								@if($registro->publicado == 'sim')
								<a class="btn light-green col s12" href="#">Publicado</a>
								@else
								<a class="btn red col s12" href="#">Não Publicado</a>
								@endif
							</div>
							<div class="col s12 m4">
								<a class="btn teal col s12" href="{{route('admin.editar', $registro->id)}}"">Editar</a>
							</div>
							<div class="col s12 m4">
								<a class="btn blue-grey col s12" href="{{route('admin.deletar', $registro->id)}}"">Deletar</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>	
		</div>
	</div>
</div>
@endsection