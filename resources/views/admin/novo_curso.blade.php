@extends('template.template')

@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
			<div class="card-panel">
				<div class="col s12">
					<h4 class="flow-text header2">Cadastro de novo Curso</h4>
				</div>
				<form action="{{ route('registerCurso') }}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="row">
							<div class="input-field col s12">										
								<input name="cursoName" id="first_name" type="text">
								<label for="first_name">Nome do Curso</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">										
								<select name="area_id">
									@foreach($areas as $area)
									<option value="{{ $area->id }}">{{ $area->descricao }}</option>
									@endforeach
								</select>
								<label>Área</label>
							</div>                         
							<div class="row">
								<div class="input-field col s12">
									<button class="btn waves-effect waves-light right" type="submit" name="action">Cadastrar
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
						</div>
					</div>
				</form>
			</div>
			<div class="card-panel">
				<table style="font-size: 13px;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Curso</th>
							<th>Área</th>
							<th>Data de Criação</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cursos as $curso)
						<tr>
							<td>{{$curso['id']}}</td>
							<td>{{$curso['descricao']}}</td>
							<td>{{$curso->getAreaName()}}</td><!--Pega nome area -->
							<td>{{$curso['created_at']->format('d/m/Y')}}</td>
							<td>
								<button class="btn azul-3 btnEditar" data-id="{{$curso['id']}}">Editar</button>
								<button class="btn cinza-2 btnExcluir" data-id="{{$curso['id']}}">Excluir</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> 
			</div>
		</div>
	</div>
</div>
<div id="modalEditar" class="modal">
	<div class="modal-content">
		<div class="row">
			<h4 class="margin_left_normal">Editar Curso</h4>
			<form method="get" id="form_Update" class="margin_top_large">
				<div class="input-field col s12">										
					<input name="cursoName" id="editarCurso" type="text">
					<label for="editarCruso">Nome do Curso</label>
				</div>
				<div class="input-field col s12">										
					<select name="area_id" id="editarArea">
						@foreach($areas as $area)
						<option value="{{ $area->id }}">{{ $area->descricao }}</option>
						@endforeach
					</select>
					<label>Área</label>
				</div>
				<div class="col s12">
					<button class="btn right">Atualizar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="modalExcluir" class="modal">
	<div class="modal-content">
		<h4 class="margin_left_normal">Confirmar Exclusão</h4>
		<div class="row nomargin">
			<div class="col s12">
				<a class="btn col s12 m5 modal-close">Não</a>
				<a class="btn col s12 m5 red right nomargin" id="btnConfirmar">Sim</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
$('.btnEditar').click(function(){
	var id = $(this).attr('data-id');
	var par_url = "<?php echo url('/updateCurso/').'/'; ?>" + id;
	$.ajax({
        type:"GET",
        url: "{{route('editarCurso')}}",
        data: {
        	id : id
        },
        dataType: 'json',
        success: function(retorno) {
        	console.log(retorno);
			$('#editarCurso').val(retorno.descricao);
			var area = retorno.area_id;
			$('#editarArea .'+area ).selected;
           	$('#modalEditar').modal('open');
           	Materialize.updateTextFields();
			$('#form_Update').attr('action', par_url);
        },
        error: function(retorno){
            console.log(retorno);
        },
    }); 
});

$('.btnExcluir').click(function(){
	var id = $(this).attr('data-id');
	var par_url = "<?php echo url('/deletarCurso/').'/'; ?>" + id;
	$('#modalExcluir').modal('open');
	$('#btnConfirmar').attr('href', par_url);
  });
@endsection