@extends('template.template')
@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
			<div class="card-panel">
				<div class="col s12">
					<h4 class="flow-text header2">Cadastro de nova Área</h4>
				</div>
				<form action="{{ route('registerArea') }}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="row">
							<div class="input-field col s12">										
								<input name="areaName" id="name3" type="text">
								<label for="first_name">Nome da Área</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<button class="btn azul-1 right" type="submit" name="action">Cadastrar
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
				</form>
			</div>
			<div class="card-panel">
				<table style="font-size: 13px;">
					<thead>
						<tr>
							<th class="hide-on-med-and-down">ID</th>
							<th>Descricao</th>
							<th class="hide-on-med-and-down">Data de Criação</th>
							<th class="hide-on-med-and-down">Data de Atualização</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						@foreach($areas as $area)
						<tr>
							<td class="hide-on-med-and-down">{{$area['id']}}</td>
							<td>{{$area['descricao']}}</td>
							<td class="hide-on-med-and-down">{{$area['created_at']->format('d/m/Y')}}</td>
							<td class="hide-on-med-and-down">{{$area['updated_at']->format('d/m/Y')}}</td>
							<td>
								<button class="btn azul-3 btnEditar col s12 m6" data-id="{{$area['id']}}">Editar</button>
								<button class="btn cinza-2 btnExcluir col s12 m6" data-id="{{$area['id']}}">Excluir</button>
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
			<h4 class="margin_left_normal">Editar Área</h4>
			<form method="get" id="form_Update" class="margin_top_large">
				<div class="col s12 input-field">										
					<input name="descricao" type="text" id="editarArea" autocomplete="off">
					<label for="first_name">Nome da Área</label>
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
				<a class="btn col s12 m5 cinza-2 right nomargin" id="btnConfirmar">Sim</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
$('.btnEditar').click(function(){
	var id = $(this).attr('data-id');
	var par_url = "<?php echo url('/area/atualizar/').'/'; ?>" + id;
	$.ajax({
        type:"GET",
        url: "{{route('editarArea')}}",
        data: {
        	id : id
        },  
        success: function(retorno) {
			$('#editarArea').val(retorno);
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
	var par_url = "<?php echo url('/area/deletar/').'/'; ?>" + id;
	$('#modalExcluir').modal('open');
	$('#btnConfirmar').attr('href', par_url);
  });
@endsection