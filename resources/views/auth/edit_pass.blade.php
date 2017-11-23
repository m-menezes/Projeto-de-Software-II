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
                            <span class="card-title activator grey-text text-darken-4">Alterar Senha
                                <i class="material-icons right">more_vert</i>
                            </span>
                        </div>
                        <form action="{{route('edit_pass.update')}}" method="post">
                            {{ csrf_field() }}
                            <div class="input-field col s12">
                                <input name="password_old" id="password" type="password">
                                <label for="password">Senha Antiga</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input name="password" id="password" type="password">
                                <label for="password">Nova Senha</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input name="password_confirmation" id="password_confirmation" type="password">
                                <label for="password_confirmation">Repita Senha</label>
                            </div>
                            <p><button class="btn azul-3 margin_left_normal" type="submit">Atualizar Senha</button></p>
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
                        <span class="card-title grey-text text-darken-4">Alterar Senha<i class="material-icons right">close</i></span>
                        <p>Atualizar senha de acesso.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
