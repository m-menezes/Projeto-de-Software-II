@extends('template.template')

@section('conteudo')
<div class="row">
	<div class="container">
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
@endsection