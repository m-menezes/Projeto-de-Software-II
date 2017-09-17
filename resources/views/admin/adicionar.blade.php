@extends('template.template')

@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin">
		<div class="margin_huge">
			<div class="row">
				<div class="editor">
					<div class="m_borda_title white">
						<h5>Formulario de Oportunidades</h5>
					</div>
					<form class="col s12 m_borda" action="{{route('admin.salvar')}}" method="post">
						{{ csrf_field() }}

						@include('admin.form')

						<button class="btn azul-3 margin_bottom_large margin_left_normal col s12">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection