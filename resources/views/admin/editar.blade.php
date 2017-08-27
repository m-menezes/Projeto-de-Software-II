@extends('template.template')

@section('conteudo')
<div class="row">
	<div class="container">
		<div class="editor">
			<div class="m_borda_title white">
				<h5>Formulario de Oportunidades</h5>
			</div>
			<form class="col s12 m_borda" action="{{route('admin.atualizar', $registro->id)}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@include('admin.form')

				<button class="btn green margin_bottom_large margin_left_normal col s12">Atualizar</button>
			</form>
		</div>
	</div>
</div>
@endsection