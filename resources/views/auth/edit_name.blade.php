@extends('template.template')

@section('conteudo')
<div class="row nomargin azul-3">
    @include('_includes.admin_painel')
    <div class="col s12 m10 white admin">
        <div class="margin_huge">
            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="input-field col s12 m12">
                            <span class="card-title activator grey-text text-darken-4">Alterar Dados
                                <i class="material-icons right">more_vert</i>
                            </span>
                        </div>
                        <form action="{{route('edit_name.update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-field col s12 m6">
                                <input name="name" id="name" type="text" value="{{Auth::user()->name}}">
                                <label>Nome</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input name="email" id="email" type="text" value="{{Auth::user()->email}}">
                                <label>Email</label>
                            </div>
                            <div class="file-field col s12 m12 margin_left_large">
                                <div class="btn azul-1">
                                    <span>Foto do Usuario</span>
                                    <input type="file" name="foto" id="fileInput" accept="image/*" >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Tamanho maximo do arquivo.: 2Mb" value="{{isset(Auth::user()->foto) ? Auth::user()->foto : ''}}">
                                </div>
                            </div>
                            <button class="btn azul-3 margin_left_normal" type="submit">Atualizar Cadastro</button>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </form>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Alterar Dados<i class="material-icons right">close</i></span>
                        <p>Atualizar dados como:</p>
                        <p>- Nome</br>- Email de acesso</br>- Foto do usuario</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
