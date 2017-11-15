@extends('template.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
			<div class="card-panel">
				<div class="col s12">
					<h4 class="flow-text header2">Formulario de Oportunidades</h4>
				</div>
				<form action="{{route('admin.atualizar', $registro->id)}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="put">
					@include('admin.form')
					<div class="row">
						<button class="btn right">Atualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
$(document).ready(function() {
	$('#textarea_descricao').trigger('autoresize');
});

var control = $("#fileInput"),
    clearBn = $("#btnClear");
clearBn.on("click", function(){
	$.ajax({
        type:"PUT",
        url: "{{route('deletarArquivo')}}",
        data: {
        	id : "{{$registro->id}}",
        },  
        success: function(retorno) {
			$('.file-path-wrapper input').val('');
    		control.replaceWith( control.val('').clone( true ) );
        },
        error: function(retorno){
            console.log(retorno);
        },
    }); 
	
});
@endsection('script')