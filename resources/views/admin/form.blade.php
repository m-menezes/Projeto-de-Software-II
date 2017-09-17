<?php $dt = new DateTime();?>
<div class="row margin_top_large">
	<div class="col s12 m12">
		<div class="input-field col s12">
			<input type="text" name="titulo" required value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
			<label>Titulo</label>
		</div>
		<div class="input-field col s12">
			<textarea id="textarea_descricao" class="materialize-textarea" name="descricao" required >{{ isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
			<label for="textarea_descricao">Descrição</label>
		</div>
	</div>
	<div class="col s12 m8">
		<div class="input-field col s12">
			<input id="email" type="email" class="validate" name="email" required value="{{isset($registro->email) ? $registro->email : ''}}">
            <label for="email" data-error="Email inválido" data-success="Email válido">Email</label>
		</div>
		<div class="input-field col s12">
			<select  name="centro">
				<option value="Sem Centro" {{ isset($registro->centro) && $registro->centro == 'Sem Centro' ? 'selected' : '' }}>Selecionar</option>
				<option value="Artes e Letras" {{ isset($registro->centro) && $registro->centro == 'Artes e Letras' ? 'selected' : '' }}>Artes e Letras</option>
				<option value="Centro de Ciências da Saúde" {{ isset($registro->centro) && $registro->centro == 'Centro de Ciências da Saúde' ? 'selected' : '' }}>Centro de Ciências da Saúde</option>
				<option value="Centro de Ciências Sociais e Humanas" {{ isset($registro->centro) && $registro->centro == 'Centro de Ciências Sociais e Humanas' ? 'selected' : '' }}>Centro de Ciências Sociais e Humanas</option>
				<option value="Ciências Naturais e Exatas" {{ isset($registro->centro) && $registro->centro == 'Ciências Naturais e Exatas' ? 'selected' : '' }}>Ciências Naturais e Exatas</option>
				<option value="Ciências Rurais" {{ isset($registro->centro) && $registro->centro == 'Ciências Rurais' ? 'selected' : '' }}>Ciências Rurais</option>
				<option value="Educação" {{ isset($registro->centro) && $registro->centro == 'Educação' ? 'selected' : '' }}>Educação</option>
				<option value="Educação Física e Desportos" {{ isset($registro->centro) && $registro->centro == 'Educação Física e Desportos' ? 'selected' : '' }}>Educação Física e Desportos</option>
				<option value="Tecnologia" {{ isset($registro->centro) && $registro->centro == 'Tecnologia' ? 'selected' : '' }}>Tecnologia</option>
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
			<input type="text" disabled name="criado" value="{{isset($registro->criado) ? $registro->criado : 'Auth::user()->name'}}">
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