<?php $dt = new DateTime();?>
<div class="row margin_top_large">
	<div class="col s12 m12">
		<div class="input-field col s12">
			<input type="text" name="titulo" required value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
			<label>Titulo</label>
		</div>
		<div class="input-field col s12">
			<textarea id="textarea_descricao" class="materialize-textarea" name="descricao" required value="{{isset($registro->descricao) ? $registro->descricao : ''}}"></textarea>
			<label for="textarea_descricao">Descrição</label>
		</div>
	</div>
	<div class="col s12 m8">
		<div class="input-field col s12">
			<input type="text" name="email" required value="{{isset($registro->email) ? $registro->email : ''}}">
			<label>Email</label>
		</div>
		<div class="input-field col s12">
			<select  name="centro">
				<option value="0" {{ isset($registro->centro) && $registro->centro == '0' ? 'selected' : '' }}>Selecionar</option>
				<option value="1" {{ isset($registro->centro) && $registro->centro == '1' ? 'selected' : '' }}>Artes e Letras</option>
				<option value="2" {{ isset($registro->centro) && $registro->centro == '2' ? 'selected' : '' }}>Centro de Ciências da Saúde</option>
				<option value="3" {{ isset($registro->centro) && $registro->centro == '3' ? 'selected' : '' }}>Centro de Ciências Sociais e Humanas</option>
				<option value="4" {{ isset($registro->centro) && $registro->centro == '4' ? 'selected' : '' }}>Ciências Naturais e Exatas</option>
				<option value="5" {{ isset($registro->centro) && $registro->centro == '5' ? 'selected' : '' }}>Ciências Rurais</option>
				<option value="6" {{ isset($registro->centro) && $registro->centro == '6' ? 'selected' : '' }}>Educação</option>
				<option value="7" {{ isset($registro->centro) && $registro->centro == '7' ? 'selected' : '' }}>Educação Física e Desportos</option>
				<option value="8" {{ isset($registro->centro) && $registro->centro == '8' ? 'selected' : '' }}>Tecnologia</option>
			</select>
			<label>Centro:</label>
		</div>
		<div class="input-field col s6">
			<input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}" >
			<label>Valor</label>
		</div>
		<div class="input-field col s6">
			<input type="text" name="carga_horaria" value="{{isset($registro->carga_horaria) ? $registro->carga_horaria : ''}}">
			<label>Carga Horaria</label>
		</div>
	</div>
	<div class="col s12 m4">
		
		<div class="input-field col s12">
			<input type="text" name="criado" disabled value="{{isset($registro->criado) ? $registro->criado : 'Auth::user()->name'}}">
			<label>Criado por: </label>
		</div>
		<div class="input-field col s12">
			<input type="text" disabled name="data" value="{{isset($registro->created_at) ? $registro->created_at : $dt->format('d/m/Y')}}">
			<label>Data de criação: </label>
		</div>
		<div class="col s12 m4">
			<input type="checkbox" class="filled-in" id="publicado" value="true" name="publicado" {{ isset($registro->publicado) && $registro->publicado == 'sim' ? 'checked' : '' }} />
			<label for="publicado">Publicado</label>
		</div>
	</div>
</div>