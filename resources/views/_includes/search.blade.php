
<div class="row">
	<div class="container">
		<div class="m_borda_title white">
			<h5>Localizar Oportunidade</h5>
		</div>
		<div class="m_borda busca col s12">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input id="input_text" type="text">
						<label for="input_text">Busca</label>
					</div>
					<div class="input-field col s6">
						<select name="area_id">
							@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->descricao }}</option>
							@endforeach
						</select>
						<label for="input_text">Area de Conhecimento</label>
					</div>
				</div>
			</form>
			<div class="margin_bottom_large col s12 btn azul-3">
				Buscar
			</div>
		</div>
	</div>
</div>