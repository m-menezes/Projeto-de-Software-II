@extends('template.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('conteudo')
<div class="row nomargin azul-3">
	@include('_includes.admin_painel')
	<div class="col s12 m10 white admin" >
		<div class="margin_huge">
			<div class="card-panel hide-on-med-and-down">
				<div id="estatistica" height="30px">
				</div>
			</div>
			<div class="postagens">
				<a id="botaoHelp" class="center col m2 patreon-ad modal-trigger" href="#legendaIcones">Ajuda sobre icones</a>
				@foreach($registros as $registro)
				<div class="row">
					<div class="card cinza">
						<div class="card-content">
							<div class="row nomargin">
								<div class="row">
									<div class="col s12 l9 card-title admin_normal">
										<h5 class="nomargin">{{ str_limit($registro->titulo, $limit = 50, $end = '...') }}</h5>
									</div>
									<div class=" col s12 l3 icons"> 
										@if($registro->edital)
										<a class="tooltipped black-text" data-position="top" data-delay="50" data-tooltip="Edital: {{$registro->edital}}"><i class="material-icons">assignment</i></a>
										@endif
										<a class="tooltipped black-text" data-position="top" data-delay="50" data-tooltip="Data de Publicação: {{$registro->created_at->format('H:i - d/m/Y')}}"><i class="material-icons">access_time</i></a>
										<a class="tooltipped black-text" data-position="top" data-delay="50" data-tooltip="Data de Atualização: {{$registro->updated_at->format('H:i - d/m/Y')}}"><i class="material-icons">update</i></a>
										@if($registro->remuneracao)
										<a class="tooltipped black-text" data-position="top" data-delay="50" data-tooltip="Remuneração: R${{$registro->remuneracao}}"><i class="material-icons">attach_money</i></a>
										@else
										<a class="tooltipped black-text" data-position="top" data-delay="50" data-tooltip="Sem Remuneração"><i class="material-icons">money_off</i></a>
										@endif
									</div>
								</div>
								<div class="row nomargin">
									<div class="col s12 l8">
										<p>{{ str_limit($registro->descricao, $limit = 300, $end = '...')}}</p>
									</div>
									<div class="col s12 l4" id="chips_post">
										@if($registro->carga_horaria)
										<div class="chip col l12 blue-grey white-text">
											Carga Horaria: {{$registro->carga_horaria}} Horas
										</div>
										@endif
										@if($registro->email_contato)
										<div class="chip col l12 blue-grey white-text">
											Contato: {{$registro->email_contato}}
										</div>
										@endif
										@if($registro->area)
										<div class="chip col l12 blue-grey white-text">
											Área de Atuação: {{$registro->area}}
										</div>
										@endif
										@if($registro->local)
										<div class="chip col l12 blue-grey white-text">
											Curso: {{$registro->local}}
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="card-action">
							@if($registro->publicado == 'sim')
							<a id="publicado{{$registro->id}}" class="azul-1-text" href="javascript:altera_status({{$registro->id}})">Publicado</a>
							@else
							<a id="publicado{{$registro->id}}" class="azul-2-text" href="javascript:altera_status({{$registro->id}})">Não Publicado</a>
							@endif
							<a class="vermelho-text btnExcluir right" data-id="{{$registro->id}}">Deletar</a>
							<a class="azul-3-text right" href="{{route('admin.editar', $registro->id)}}">Editar</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>	
		</div>	
		<?php echo $registros->render(); ?>
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

<!-- Modal Legenda de Icones Footer -->
<div id="legendaIcones" class="modal bottom-sheet">
	<div class="modal-content">
		<h5>Legenda de Icones</h5>
		<p>Os icones apresentam valores ao terem o mouse posicionado sobre os mesmos.</p>
		<ul>
			<li><i class="material-icons">assignment</i> - Oportunidade possui um arquivo de edital</li>
			<li><i class="material-icons">access_time</i> - Data de publicação</li>
			<li><i class="material-icons">update</i> - Data da ultima atualização</li>
			<li><i class="material-icons">attach_money</i> - Oportunidade remunerada</li>
			<li><i class="material-icons">money_off</i> - Oportunidade não remunerada</li>
		</ul>
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
$('.btnExcluir').click(function(){
    var id = $(this).attr('data-id');
    var par_url = "<?php echo url('/postagem/deletar/').'/'; ?>" + id;
    $('#modalExcluir').modal('open');
    $('#btnConfirmar').attr('href', par_url);
  });

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
                $("#publicado"+idOport).removeClass('azul-1-text');
                $("#publicado"+idOport).addClass('azul-2-text');
            }
            else{
                $("#publicado"+idOport).append("PUBLICADO");
                $("#publicado"+idOport).addClass('azul-1-text');
                $("#publicado"+idOport).removeClass('azul-2-text');
            }
            loadchart();
        },
        error: function(retorno){
            console.log(retorno);
        },
    });
}
@endsection