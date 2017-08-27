@extends('template.template')

@section('conteudo')
<div class="row nomargin">
	<div class="col s12 m2 nopad">
		<div class="painel  blue-grey darken-3">
			@include('_includes.admin_painel')
		</div>
	</div>
	<div class="col s10">
		<div class="margin_left_large margin_right_large">
			<div class="editor">
				<div class="m_borda_title white">
					<h5>Formulario de Oportunidades</h5>
				</div>
				<form class="col s12 m_borda" action="{{route('admin.salvar')}}" method="post">
					{{ csrf_field() }}

					@include('admin.form')

					<button class="btn green margin_bottom_large margin_left_normal col s12">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection