<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body class="blue-grey darken-4">
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
            <img class="logo" src="http://w3.ufsm.br/ccsh/modules/mod_ufsm_logo/images/brasao-cores.png" alt="" class="circle responsive-img valign profile-image-login" style="max-width: 120px; max-height: 120px">
            <p class="teal-text text-darken-2 flow-text center login-form-text">Oportunidades UFSM</p>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="email" id="username" type="text" required>
            <label for="username" class="center-align">Email</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password" required>
            <label for="password">Senha</label>
          </div>
        </div>

        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Salvar Credenciais</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">            
             <button class="btn waves-effect waves-light col s12" type="submit" name="action">LOGIN			   
			 </button>            
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Registre-se Agora</a></p>
          </div>

          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Esqueceu sua senha ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
                          Scripts
    ================================================ -->  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>  
</body>
</html>

<!-- 
<div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://detroitit.com/wp-content/uploads/2015/12/ico-it-support.svg" alt="" class="responsive-img valign profile-image-login" style="max-height: 100px; max-width: 100px;">
            <p class="flow-text center login-form-text light-green-text text-darken-2">Oportunidades UFSM</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input class="validate" id="email" type="email">
            <label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Salvar Credenciais</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a href="login.html" class="btn waves-effect waves-light col s12">Login</a>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="register.html">Criar Conta</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="forgot-password.html">Esqueceu sua Senha?</a></p>
          </div>          
        </div>
 
      </form>
    </div>
  </div>


-->