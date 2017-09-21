@extends('template.template')

@section('conteudo')
	<div class="container">

		<div class="col s12 m12 l6">
         <div class="card-panel">
            <h4 class="flow-text header2">Cadastro de novo Curso</h4>
            <form action="{{ route('registerCurso') }}" method="post">
               {{ csrf_field() }}
					
               <div class="row">

               	<form class="col s12">

                  	<div class="row">
                     	<div class="input-field col s12">										
									<input name="cursoName" id="first_name" type="text">
									<label for="first_name">Nome do Curso</label>
								</div>
							</div>


							<div class="row">
								<select name="area_id">
									@foreach($areas as $area)
										<option value="{{ $area->id }}">{{ $area->descricao }}</option>
									@endforeach
								</select>
							</div>                         

							<div class="row">
							  <div class="input-field col s12">
							      <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Cadastrar
							        <i class="mdi-content-send right"></i>
							      </button>
							  </div>

								@if ($errors->any())
								   <div class="alert alert-danger">
								       <ul>
								           @foreach ($errors->all() as $error)
								               <li>{{ $error }}</li>
								           @endforeach
								       </ul>
								   </div>
								@endif

							</div>
                 </div><!-- end main row -->
             </form>
			</div><!-- end card panel -->
		</div><!-- end div -->
	</div><!-- end container -->
@endsection