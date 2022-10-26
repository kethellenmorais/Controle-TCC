<?php $v->layout("../_theme"); ?>

<div id="login">
  <div class="overlay"></div>
  <!-- LOADER TEMPLATE -->
  <div id="page-loader">
    <div class="loader-icon fa fa-spin colored-border"></div>
  </div>

  <!-- NAVBAR================================================= -->
  <nav class="navbar navbar-expand-lg navbar-dark trans-navigation fixed-top navbar-togglable">
    <div class="container">
      <div class="collapse navbar-collapse has-dropdown" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="cadastro.html" title="Ir para página de Cadastro" class="nav-link js-scroll-trigger">
              Cadastro
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section class="section centralizar">
    <div class="entrar-site">
      <div class="entrar-titulo">
        <h2>Login</h2>
        <p>Digite os seus dados para acessar a plataforma</p>
      </div>

      <form action="" method="get" autocomplete="off">
        <div class="entrar-input">
          <p>Digite seu usuário</p>
          <input type="text" name="usuario" placeholder="Seu usuário..." maxlength="30" required />
        </div>

        <div class="entrar-input">
          <p>Digite sua senha</p>
          <input type="password" placeholder="Sua senha..." name="password" maxlength="16" required />
          <p id="cadastre-se">Ainda não tem cadastro ? <a href="cadastro.html">Cadastre-se</a></p>
        </div>

        <div class="entrar-button">
          <button class="btn btn-primary" type="submit">Entrar</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Page Scroll to Top  -->
  <a id="scroll-to-top" class="scroll-to-top js-scroll-trigger" href="#top-header">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Essential Scripts=====================================-->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</div>
