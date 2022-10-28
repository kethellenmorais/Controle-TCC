<?php $v->layout("_theme"); ?>

<div id="cadastro">
  <div class="overlay"></div>

  <div id="page-loader">
    <div class="loader-icon fa fa-spin colored-border"></div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark trans-navigation fixed-top navbar-togglable header-transparent">
    <div class="container">
      <div class="collapse navbar-collapse has-dropdown" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= $router->route("app.login") ?>" title="Ir para página de Login" class="nav-link js-scroll-trigger">
              Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="section centralizar">
    <div class="entrar-site">
      <div class="entrar-titulo">
        <h2>Cadastro</h2>
        <p>Realize o cadastro para acessar a plataforma</p>
      </div>

      <form action="<?= $router->route("app.cadastro_post") ?>" method="post" autocomplete="off">

        <div class="entrar-input">
          <p>Digite seu nome</p>
          <input type="text" name="name" placeholder="Seu nome..." maxlength="30" required />
        </div>

        <div class="entrar-input">
          <p>Digite seu usuário</p>
          <input type="text" name="username" placeholder="Seu usuário..." maxlength="30" required />
        </div>

        <div class="entrar-input">
          <p>Digite sua senha</p>
          <input type="password" placeholder="Sua senha..." name="password" maxlength="16" required />
        </div>

        <div class="entrar-input">
          <p>Selecione o tipo de usuário</p>
          <select name="access" id="">
            <option selected disabled>Selecione uma opção</option>
            <option value="1">Aluno</option>
            <option value="2">Professor</option>
          </select>
        </div>

        <div class="entrar-button">
          <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
      </form>
    </div>
  </section>

  <?php
  $v->insert("utils/to_top.php");
  ?>

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
            willClose: () => location.href = '<?= url("/") ?>'
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
