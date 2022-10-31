<?php $v->layout("_theme"); ?>

<div id="login">
  <div class="overlay"></div>

  <div id="page-loader">
    <div class="loader-icon fa fa-spin colored-border"></div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark trans-navigation fixed-top navbar-togglable">
    <div class="container">
      <div class="collapse navbar-collapse has-dropdown" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= $router->route("app.cadastro") ?>" title="Ir para página de Cadastro" class="nav-link js-scroll-trigger">
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

      <form action="<?= $router->route("app.login_post") ?>" method="post" autocomplete="off">
        <div class="entrar-input">
          <p>Digite seu usuário</p>
          <input type="text" name="username" placeholder="Seu usuário..." maxlength="30" required />
        </div>
        <div class="entrar-input">
          <p>Digite sua senha</p>
          <input type="password" placeholder="Sua senha..." name="password" maxlength="16" required />
          <p id="cadastre-se">Ainda não tem cadastro ? <a href="<?= $router->route("app.cadastro") ?>">Cadastre-se</a></p>
        </div>

        <div class="entrar-button">
          <button class="btn btn-primary" type="submit">Entrar</button>
        </div>
      </form>
    </div>
  </section>
</div>

<?php
$v->start("js");
?>
<script>

  $("form").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    $.ajax({
      url: form.attr("action"),
      data: form.serialize(),
      type: "POST",
      dataType: "json",
      success: function(callback) {
        if (callback.error) {

          Swal.fire({
            icon: callback.type,
            title: 'Oops...',
            text: callback.error,
            allowOutsideClick: false
          })

        } else {

          Swal.fire({
            icon: callback.type,
            title: 'Sucesso',
            text: callback.message,
            allowOutsideClick: false,
            willClose: () => location.href = '<?= url("/inicio") ?>'
          })

        }
      },
      error: function() {

      }
    });
  });
</script>
<?php
$v->end();
?>
