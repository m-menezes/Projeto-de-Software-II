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
				<form class="col s12 m12 m_borda" action="{{route('admin.atualizar', $registro->id)}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="put">
					@include('admin.form')

					<button class="btn green margin_bottom_large margin_left_normal col s12">Atualizar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection