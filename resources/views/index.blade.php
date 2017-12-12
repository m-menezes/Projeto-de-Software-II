@extends('template.template')

@section('conteudo')
<!-- CONTEUDO INTERNO SITE -->
@include('_includes.search')
<div class="margin_bottom_huge">
	<div class="row">
		<div class="container">
			<div class="postagens">
				<?php if(count($registros) == 0){
					echo "Sem Resultado";
				} ?>
				@foreach($registros as $registro)
				<div class="row">
					<div class="col s12 m12">
						<div class="card cinza">
							<div class="card-content">
								<div class="row">
									<div class="col s12 l8">
										<span class="card-title admin_normal">
										<a class="azul-3-text" href="{{route('postagem', $registro->id)}}">{{ $registro->titulo }}</a>
										</span>
										<p>{{ str_limit($registro->descricao, $limit = 200, $end = '...')}}</p>
									</div>
									<div class="col s12 l4" id="chips_post">
										<div class="chip col l12 blue-grey white-text">
											@if($registro->remuneracao)
											Remunaração: R${{$registro->remuneracao}}
											@else
											Sem Remuneração
											@endif
										</div>
										@if($registro->carga_horaria)
										<div class="chip col l12 blue-grey white-text">
											Carga Horaria: {{$registro->carga_horaria}} Horas
										</div>
										@endif
										@if($registro->email_contato)
										<div class="chip col l12 blue-grey white-text">
											Contato: {{$registro->email_contato}}
										</div>
										@endif
									</div>
								</div>
							</div>
							<div class="card-action">
								<a class="azul-3-text" href="{{route('postagem', $registro->id)}}"">Mais detalhes</a>
								@if($registro->edital)
								<a href="/storage{{$registro->edital_location}}" class="azul-3-text right">Baixar Edital</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				
				@endforeach
			</div>	
	        <?php echo $registros->render(); ?>
		</div>
	</div>
</div>
<!-- CONTEUDO INTERNO SITE -->
@endsection