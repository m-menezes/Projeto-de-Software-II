
<div class="row">
	<div class="container">
		<div class="m_borda_title white">
			<h5>Localizar Oportunidade</h5>
		</div>
		<div class="m_borda busca col s12">
			<form action="{{ route('getOpportunitiesByText') }}" method="POST" class="col s12">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">					
					<div class="input-field col s12">
						<input class="search_string" id="input_text" name="searchString" type="text">
						<label for="input_text">Busca</label>
					</div>
					<div class="input-field col s6">
						<select class="search_string" name="area_id" id="opportunities_list">
							@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->descricao }}</option>
							@endforeach
						</select>
						<label for="input_text">Area de Conhecimento</label>
					</div>
				</div>

			<button id="searchButton" class="btn-buscar col s12 btn azul-3 btn waves-effect waves-light" type="submit" name="action">Buscar	
		  	</button>			
			</form>
		</div>
	</div>
</div>

@section ('script')
	//Change opportunities list on dropdown change
	// Add LI : https://www.w3schools.com/jsref/met_node_appendchild.asp
{{-- 	$('#searchButton').click(function(e){
		var _token = $('input[name="_token"]').val();
		e.preventDefault();
		//Get string 
		var string = $('.search_string').val();

		//Ajax to bring data related to the selected area of knowledge
		 $.ajax({
		 	method: 'POST',
		 	url: ' {{ route('getOpportunitiesByText') }} ', //Trazer disciplinas
		 	data: { _token : _token, searchString: string },
		 	success: function(data){
		 		console.log(data);
		 		alert('SUCCESS');
		 	}
		 });
	}); --}}

@stop