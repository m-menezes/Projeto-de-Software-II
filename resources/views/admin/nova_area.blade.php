@extends('template.template')

@section('conteudo')
    <div class="container">

     <div class="col s12 m12 l6">
         <div class="card-panel">
             <h4 class="flow-text header2">Cadastro de nova Área</h4>
             <form action="{{ route('registerArea') }}" method="post">
                 {{ csrf_field() }}

                 <div class="row">

                     <form class="col s12">

                         <div class="row">
                             <div class="input-field col s12">										
										<input name="areaName" id="name3" type="text">
										<label for="first_name">Nome da Área</label>
                             </div>
                         </div>

                         <div class="row">
                             <div class="input-field col s12">
                                 <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Cadastrar
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
                 </div><!-- end main row -->
             </form>
         </div>
     </div>
    </div>
@endsection