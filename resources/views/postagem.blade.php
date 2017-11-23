@extends('template.template')

@section('conteudo')
@include('_includes.search')
<!-- CONTEUDO INTERNO SITE -->
<div class="row">
	<div class="container">
		<div class="card-panel cinza">
			<div class="row">
				<div class="input-field col s12 m8">
					<input type="text" disabled name="titulo" value="{{$registro->titulo}}">
					<label>Titulo</label>
				</div>
				<div class="input-field col s12 m4">
					<input type="text" disabled name="data" value="{{$registro->created_at}}">
					<label>Data de criação: </label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea id="textarea_descricao" class="materialize-textarea" disabled name="descricao" >{{$registro->descricao}}</textarea>
					<label for="textarea_descricao">Descrição</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m4">
					<input id="email" type="email" class="validate" disabled name="email_contato" value="{{$registro->email_contato}}">
					<label for="email" data-error="Email inválido" data-success="Email válido">Email de Contato</label>
				</div>
				<div class="input-field col s6 m4">
					<input id="remuneracao" type="number" disabled name="remuneracao" value="{{$registro->remuneracao}}" >
					<label>Remuneração</label>
				</div>
				<div class="input-field col s6 m4">
					<input id="carga_horaria" type="number" disabled name="carga_horaria" value="{{$registro->carga_horaria}}">
					<label>Carga Horaria</label>
				</div>
			</div>
			<div class="row">
				@if($registro->area)
				<div class="input-field col s12 m6">
					<input type="text" disabled name="area" value="{{$registro->area}}">
					<label>Área de Atuação</label>
				</div>
				@endif
				@if($registro->local)
				<div class="input-field col s12 m6">
					<input type="text" disabled name="local" value="{{$registro->local}}">
					<label>Local</label>
				</div>
				@endif
			</div>
			@if($registro->edital)
				@if($registro->edital_extension == 'image/jpeg' || $registro->edital_extension == 'image/png' || $registro->edital_extension == 'image/gif')
				<div>
					<img src="/storage{{$registro->edital_location}}" width="100%">
				</div>
				@elseif($registro->edital_extension == 'application/pdf')
				<div>
					<a href="/storage{{$registro->edital_location}}" class="chip blue-grey white-text">Baixar Edital</a>
				</div>
				<div class="row">
					<object data="/storage{{$registro->edital_location}}" type="application/pdf" width="100%" height="600px">
						alt : <a href="/storage{{$registro->edital_location}}">{{$registro->edital}}</a>
					</object>
				</div>
				@else
				<div>
					<a href="/storage{{$registro->edital_location}}" class="chip blue-grey white-text">Baixar Edital</a>
				</div>
				@endif
			@endif
		</div>
	</div>
</div>
<!-- CONTEUDO INTERNO SITE -->
@endsection
@section('script')
	$(document).ready(function() {
	$('#textarea_descricao').trigger('autoresize');
});
@endsection('script')

<style type="text/css">
input:not([type]):disabled+label, input:not([type])[readonly="readonly"]+label, input[type=text]:not(.browser-default):disabled+label, input[type=text]:not(.browser-default)[readonly="readonly"]+label, input[type=password]:not(.browser-default):disabled+label, input[type=password]:not(.browser-default)[readonly="readonly"]+label, input[type=email]:not(.browser-default):disabled+label, input[type=email]:not(.browser-default)[readonly="readonly"]+label, input[type=url]:not(.browser-default):disabled+label, input[type=url]:not(.browser-default)[readonly="readonly"]+label, input[type=time]:not(.browser-default):disabled+label, input[type=time]:not(.browser-default)[readonly="readonly"]+label, input[type=date]:not(.browser-default):disabled+label, input[type=date]:not(.browser-default)[readonly="readonly"]+label, input[type=datetime]:not(.browser-default):disabled+label, input[type=datetime]:not(.browser-default)[readonly="readonly"]+label, input[type=datetime-local]:not(.browser-default):disabled+label, input[type=datetime-local]:not(.browser-default)[readonly="readonly"]+label, input[type=tel]:not(.browser-default):disabled+label, input[type=tel]:not(.browser-default)[readonly="readonly"]+label, input[type=number]:not(.browser-default):disabled+label, input[type=number]:not(.browser-default)[readonly="readonly"]+label, input[type=search]:not(.browser-default):disabled+label, input[type=search]:not(.browser-default)[readonly="readonly"]+label, textarea.materialize-textarea:disabled+label, textarea.materialize-textarea[readonly="readonly"]+label{
	color: #053552 !important;
	font-weight: 600;
}
input:not([type]):disabled, input:not([type])[readonly="readonly"], input[type=text]:not(.browser-default):disabled, input[type=text]:not(.browser-default)[readonly="readonly"], input[type=password]:not(.browser-default):disabled, input[type=password]:not(.browser-default)[readonly="readonly"], input[type=email]:not(.browser-default):disabled, input[type=email]:not(.browser-default)[readonly="readonly"], input[type=url]:not(.browser-default):disabled, input[type=url]:not(.browser-default)[readonly="readonly"], input[type=time]:not(.browser-default):disabled, input[type=time]:not(.browser-default)[readonly="readonly"], input[type=date]:not(.browser-default):disabled, input[type=date]:not(.browser-default)[readonly="readonly"], input[type=datetime]:not(.browser-default):disabled, input[type=datetime]:not(.browser-default)[readonly="readonly"], input[type=datetime-local]:not(.browser-default):disabled, input[type=datetime-local]:not(.browser-default)[readonly="readonly"], input[type=tel]:not(.browser-default):disabled, input[type=tel]:not(.browser-default)[readonly="readonly"], input[type=number]:not(.browser-default):disabled, input[type=number]:not(.browser-default)[readonly="readonly"], input[type=search]:not(.browser-default):disabled, input[type=search]:not(.browser-default)[readonly="readonly"], textarea.materialize-textarea:disabled, textarea.materialize-textarea[readonly="readonly"]{
	color: #000000 !important;
}
</style>