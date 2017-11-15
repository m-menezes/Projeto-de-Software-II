@extends('template.template')

@section('conteudo')

<div class="container">

    <div class="col s12 m12 l6">
        <div class="card-panel">
            <h4 class="header2">Cadastro de novos usuários</h4>
            <form action="{{ route('registerUser') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field col s12">
                        <input name="userName" id="name3" type="text">
                        <label for="first_name">Nome</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="email" id="email3" type="email">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="password" id="password3" type="password">
                        <label for="password">Senha</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="repassword" id="password3" type="password">
                        <label for="password">Repita Senha</label>
                    </div>
                    <div class="file-field col s12 m12 margin_left_large">
                        <div class="btn ">
                            <span>Foto</span>
                            <input type="file" name="foto" id="fileInput" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Tamanho maximo do arquivo.: 2Mb">
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Cadastrar
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                    <div class="row">
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
