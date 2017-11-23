<div class="row">
	<div class="card-panel nomargin">
		<div class="container">
			<div class="row">
				<form action="{{ route('getOpportunitiesByText') }}" method="POST" class="col s12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">					
						<div class="input-field col s12">
							<input class="search_string" id="input_text" name="searchString" type="text">
							<label for="input_text">Busca</label>
						</div>
						<!-- <div class="input-field col s6">
							<select class="search_string" name="area_id" id="opportunities_list">
								@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->descricao }}</option>
								@endforeach
							</select>
							<label for="input_text">Area de Conhecimento</label>
						</div> -->
					</div>
					<button id="searchButton" class="btn-buscar col s12 btn azul-3 btn azul-3" type="submit" name="action">Buscar</button>			
				</form>
			</div>
		</div>
	</div>
</div>