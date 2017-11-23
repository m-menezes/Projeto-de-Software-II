@extends('template.template')
@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
			<div class="card-panel">
				<div class="col s12">
					<h4 class="flow-text header2">Formulario de Oportunidades</h4>
				</div>
				<form action="{{route('admin.salvar')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					@include('admin.form')
					<div class="row">
						<button class="btn azul-1 right">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection