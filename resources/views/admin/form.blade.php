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

			<select  id="areasList" name="areasList">

				@foreach($areas as $area)
					<option value="{{ $area->id }}">{{ $area->descricao }}</option>
	
				@endforeach			

			</select>
			<label>Área:</label>
			
			<div class="input-field col s12">
				<div div="cursosList" class="chips chips-initial">				

				</div>				
			</div>

			<div class="input-field col s6">
				<input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}" >
				<label>Remuneração (Mensal)</label>
			</div>

			<div class="input-field col s6">
				<input type="text" name="carga_horaria" value="{{isset($registro->carga_horaria) ? $registro->carga_horaria : ''}}">
				<label>Carga Horaria (Semanal)</label>
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

@section('script')
$(document).ready(function() {
	$('#textarea_descricao').trigger('autoresize');

	$('#areasList').change(function(){		
		var areaId = $('select[name=areasList]').val();
		$.ajax({
			type: "get",
			url: '{{ route('getCurses') }}',
			data: {
				areaId: areaId
			},
			success: function(cursos){
				$(".chips").html(""); //clear content
				cursos.forEach(function(entry){

					$(".chips").append("<div class='chip'>"+entry+"<i class='close material-icons'>close</i></div>");
				});				
			},
			error: function(){
				//What if things go wrong ?
			}
		});//CloseAjax
	});//CloseOnChange
});
@endsection('script')