<?php $dt = new DateTime();?>
<div class="row margin_top_large">
	<div class="col s12 m12">
		<div class="input-field col s12">
			<input type="text" name="titulo" required value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
			<label>Titulo *</label>
		</div>
		<div class="input-field col s12">
			<textarea id="textarea_descricao" class="materialize-textarea" name="descricao" required >{{ isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
			<label for="textarea_descricao">Descrição *</label>
		</div>
	</div>
	<div class="col s12 m4">
		<div class="input-field col s12">
			<input id="email" type="email" class="validate" name="email_contato" required value="{{isset($registro->email_contato) ? $registro->email_contato : ''}}">
			<label for="email" data-error="Email inválido" data-success="Email válido">Email de Contato *</label>
		</div>
		<div class="input-field col s6">
			<input id="remuneracao" type="number" name="remuneracao" value="{{isset($registro->remuneracao) ? $registro->remuneracao : ''}}" >
			<label>Remuneração</label>
		</div>
		<div class="input-field col s6">
			<input id="carga_horaria" type="number" name="carga_horaria" value="{{isset($registro->carga_horaria) ? $registro->carga_horaria : ''}}">
			<label>Carga Horaria</label>
		</div>
	</div>
	<div class="col s12 m4">

		<div class="input-field col s12">
			<select name="area">
				<option value="">Selecione</option>
				@foreach($areas as $area)
				<option value="{{ $area->descricao }}" {{ isset($registro->area) && $registro->area == $area->descricao ? 'selected' : '' }}>{{ $area->descricao }}</option>
				@endforeach
			</select>
			<label for="input_text">Área de Atuação</label>
		</div>
		<div class="input-field col s12">
			<select name="local">
				<option value="">Selecione</option>
				@foreach($cursos as $curso)
				<option value="{{ $curso->descricao }}" {{ isset($registro->local) && $registro->local == $curso->descricao ? 'selected' : '' }}>{{ $curso->descricao }}</option>
				@endforeach
			</select>
			<label for="input_text">Local</label>
		</div>
	</div>
	<div class="col s12 m4">
		<div class="input-field col s12 m7">
			<input type="text" disabled name="data" value="{{isset($registro->created_at) ? $registro->created_at : $dt->format('d/m/Y')}}">
			<label>Data de criação: </label>
		</div>
		<div class="col s12 m5">
			<br>
			<input type="checkbox"  id="publicado" value="true" name="publicado" {{ isset($registro->publicado) && $registro->publicado == 'sim' ? 'checked' : '' }} />
			<label for="publicado">Publicado</label>
		</div>
	</div>
	<div class="col s12">
		<div class="file-field input-field col s12 m12"">
			<div class="btn azul-1">
				<span>Arquivo</span>
				<input type="file" name="edital" id="fileInput">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" id="postFile" type="text" value="{{isset($registro->edital) ? $registro->edital : '' }}" placeholder="Tamanho maximo do arquivo.: 2Mb">
				<a href="" id="btnClear">Limpar<i class="material-icons">clear</i></a>
			</div>
		</div>
	</div>
</div>
