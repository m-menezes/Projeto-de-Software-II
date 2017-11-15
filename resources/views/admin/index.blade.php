@extends('template.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
            <div class="card-panel">
				<div id="estatistica" height="30px"></div>
			</div>
			<div class="postagens">
				<div class="row">
					@foreach($registros as $registro)
                    <div class="card-panel">
    					<div class="row">
    							<div class="col s12 m4">
    								<div class="admin_normal">
    									<h5>{{ str_limit($registro->titulo, $limit = 50, $end = '...') }}</h5>
    									<p>{{ str_limit($registro->descricao, $limit = 200, $end = '...')}}</p>
    								</div>
    							</div>
    							<div class="col s12 m8">
                                    <div class="col s12 m4">
    									<p class="admin_small">
    										<span>Email: </span>
    										{{$registro->email_contato}}
    									</p>
                                        <p class="admin_small">
                                            <span>Edital:</span>
                                            {{$registro->edital}}
                                        </p>
                                    </div>
                                    <div class="col s12 m4">
                                        <p class="admin_small ">
                                            <span>Carga Horária:</span>
                                            {{$registro->carga_horaria}} Horas
                                        </p>
                                        <p class="admin_small">
                                            <span>Valor: </span>
                                            R$ {{$registro->remuneracao}}
                                        </p>
    								</div>
    								<div class="col s12 m4">
    									<p class="admin_small">
    										<span>Data de Publicação:</span>
    										{{$registro->created_at->format('H:i - d/m/Y')}}
                                        </p>
                                        <p class="admin_small">
    										<span>Data de Atualização:</span>
    										{{$registro->updated_at->format('H:i - d/m/Y')}}
    									</p>
    								</div>
    							</div>
    							<div class="col s12 m12 margin_top_normal">
    								<div class="col s12 m4">
    									@if($registro->publicado == 'sim')
    									<a id="publicado{{$registro->id}}" class="btn azul-1 col s12" href="javascript:altera_status({{$registro->id}})">Publicado</a>
    									@else
    									<a id="publicado{{$registro->id}}" class="btn cinza-3 col s12" href="javascript:altera_status({{$registro->id}})">Não Publicado</a>
    									@endif
    								</div>
    								<div class="col s12 m4">
    									<a class="btn azul-3 col s12" href="{{route('admin.editar', $registro->id)}}">Editar</a>
    								</div>
    								<div class="col s12 m4">
                                        <a class="btn blue-grey col s12" href="javascript:deletar({{$registro->id}})">Deletar</a>
    								</div>
    							</div>
    						</div>
					</div>
					@endforeach
				</div>	
			</div>	
		</div>
	</div>
</div>
@endsection

@section('script')
loadchart();
<!-- BUSCA NO BANCO OS DADOS PARA O CHART -->
function loadchart(){
	 $.ajax({
        type:"GET",
        url:"{{route('admin.loadchart')}}", 
        success: function(data) {
        	chart(data['postagens'],data['publicados'],data['naopublicados']);
        },
        error: function(data){
            console.log('Erro Gráfico');
        },
    });
}
<!-- FUNCTION DELETE APENAS USER AUTH -->
function deletar(idOport){
    $.ajax({
        type:"POST",
        url:"{{route('admin.deletar')}}",
        data: {id : idOport},  
        success: function(retorno) {
            location.reload();
        },
        error: function(retorno){
            console.log(retorno);
        },
    });       
}

<!-- CRIA CHART -->
function chart(n_postagens,n_publicados,n_naopublicados){
	Highcharts.chart('estatistica', {
    chart: {
        type: 'bar',
        height: '200px',
    },
    title: {
        text: 'Estatísticas de suas publicações:'
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Postagens',
            align: 'high',
        },
        labels: {
            overflow: 'justify',
        }
    },
    tooltip: {
        valueSuffix: ' Postagens'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
    	floating:true,
    	y:10
    },
    series: [{
        name: 'Numero de Postagens',
        data: [n_postagens]
    }, {
        name: 'Publicados',
        data: [n_publicados]
    }, {
        name: 'Não Publicados',
        data: [n_naopublicados]
    }],
    colors: ['rgba(216, 101, 6, 1)','#0e7ec1','#323e44']

});
}
<!-- FUNÇÕES BOTÃO PUBLICAR -->
function altera_status(idOport){
    $.ajax({
        type:"GET",
        url:"{{route('admin.publicado')}}",
        data: {id : idOport},  
        success: function(retorno) {
            $("#publicado"+idOport).empty();  		          
            if(retorno=='nao'){      	
                $("#publicado"+idOport).append('NÃO PUBLICADO');
                $("#publicado"+idOport).removeClass('azul-1');
                $("#publicado"+idOport).addClass('cinza-3');
            }
            else{
                $("#publicado"+idOport).append("PUBLICADO");
                $("#publicado"+idOport).addClass('azul-1');
                $("#publicado"+idOport).removeClass('cinza-3');
            }
            loadchart();
        },
        error: function(retorno){
            console.log(retorno);
        },
    });
}
@endsection