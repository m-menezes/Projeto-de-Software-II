@extends('template.template')

@section('conteudo')
<!-- CONTEUDO INTERNO SITE -->

<div class="row">
	<div class="container">
		<div class="col s12 m12 m_borda margin_top_huge margin_bottom_huge">
			<div class="col s12 m12 padding_large">
				<div class="col s12 smaller">
					<span>Titulo</span>
					<h5>{{ $registro->titulo }}</h5>
				</div>
				<div class="col s12 smaller">
					<span>Descrição</span>
					<p>{{ $registro->descricao }}</p>
				</div>
				<div class="col s12 smaller">
					<span>Email de Contato</span>
					<p>{{ $registro->email }}</p>
				</div>
				<div class="col s12 m2 smaller">
					<span>Valor</span>
					<p>{{ $registro->valor }}</p>
				</div>
				<div class="col s12 m3 smaller">
					<span>Carga Horaria</span>
					<p>{{ $registro->carga_horaria }}</p>
				</div>					
				<div class="col s12 m3 smaller">
					<span>Centro</span>
					<p>{{ $registro->centro }}</p>
				</div>					
				<div class="col s12 m4 smaller">
					<span>Data de Publicação</span>
					<p>{{$registro->created_at->format('H:i - d/m/Y')}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CONTEUDO INTERNO SITE -->
@endsection

