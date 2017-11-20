@extends('template.template')

@section('conteudo')
<body class="azul-2">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
                <form method="POST" action="{{ route('doLogin') }}"  class="login-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 center">
                            <img class="brasao-UFSM" src="/img/ufsm-linha-cor.jpg" alt="Imagem do brasão composta por quatro elementos: escudo, flor de lis, archotes e lema. Todos contornados por fino traço preto. O escudo, na cor azul, ocupa a maior parte do brasão. Tem a forma de um retângulo vertical com a base arredondada e levemente afunilada. Centralizada no escudo, uma grande flor de lis estilizada, inclinada à esquerda, formada por um archote aceso entre duas pétalas espelhadas, em dois tons de prata. Atrás do escudo, três archotes dourados, frisados verticalmente, posicionados lado a lado, dos quais se veem apenas as extremidades. Acima do escudo, as pontas dos archotes com chamas alaranjadas. Abaixo do escudo, as bases dos archotes entrelaçadas por um listel azul com o lema Sedes Sapientiae, em letras maiúsculas, na cor prata. Circundando o brasão no sentido horário, em letras garrafais pretas: Universidade Federal de Santa Maria, 1960, com o ano centralizado na base.">
                            <p class="teal-text text-darken-2 flow-text center login-form-text">{{config('app.name')}}</p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <input name="email" id="username" type="text" required autocomplete="off">
                            <label for="username" class="center-align">Email</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" required autocomplete="off">
                            <label for="password">Senha</label>
                        </div>
                    </div>
<!--                     <div class="row">
                        <div class="input-field col s12 m12 l12  login-text">
                            <input type="checkbox" id="remember-me" checked="checked" />
                            <label for="remember-me">Salvar Credenciais</label>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="input-field col s12">            
                            <button class="btn azul-3 col s12" type="submit" name="action">LOGIN               
                            </button>            
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6 m6 l12">
                            <p class="margin medium-small"><a href="{{ route('register') }}">Registre-se Agora</a></p>
                        </div>
                    <!-- <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Esqueceu sua senha ?</a></p>
                </div> -->          
            </div>
        </form>
    </div>
</div>

@endsection

