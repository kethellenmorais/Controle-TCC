<div id="page-loader">
  <div class="loader-icon fa fa-spin colored-border"></div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark trans-navigation fixed-top navbar-togglable">
  <div class="container">
    <a class="navbar-brand" href="<?= $router->route("app.inicio") ?>">
      <h3>Início</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse has-dropdown" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">

        <?php if (!empty($_SESSION['user']) && $_SESSION['user_type'] == 2) : ?>

          <li class="nav-item">
            <a href="<?= $router->route("app.calendario") ?>" class="nav-link js-scroll-trigger">
              Calendário
            </a>
          </li>

        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#!" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Configurações
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarWelcome">
            <li>
              <a class="dropdown-item" data-toggle="modal" data-target="#change-password">Alterar senha</a>
            </li>
            <li><a class="dropdown-item" href="<?= $router->route("app.sair") ?>">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="change-password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="change-password">
          Altere a sua senha
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $router->route("app.nova_senha") ?>" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" type="text" class="arquivo_validador" value="NAO">
          <div class="modal-input">
            <p>Senha Atual</p>
            <input type="password" required name="current_password" id="current_password" placeholder="Digite a sua senha atual..." />
          </div>
          <div class="modal-input">
            <p>Nova senha</p>
            <input type="password" required name="new_password" id="new_password" placeholder="Digite a sua nova senha..." />
          </div>
          <div class="modal-input">
            <p>Confirme a senha</p>
            <input type="password" required name="confirm_password" id="confirm_password" placeholder="Confirme a sua senha atual..." />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
$v->start("js");
?>
<script>
  $("form").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if (form[0][0].value == "SIM") {
      var formData = new FormData();
      formData.append('file', document.getElementById('myFile').files[0]);
      formData.append('nome_grupo', document.getElementById('nome_grupo').value);

      $.ajax({
        url: document.getElementById('enviaArquivo').value,
        data: formData,
        type: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(callback) {
          if (callback.error) {

            Swal.fire({
              icon: callback.type,
              title: 'Oops...',
              html: callback.error,
              allowOutsideClick: false
            })

          } else {
            document.getElementById('filename').value = callback.filename
            document.getElementById('validador').value = "NAO"

            $("#form_file").submit();
          }
        },
        error: function() {

        }
      });

    } else {

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
              willClose: () => {
                if (callback.reload) {
                  location.reload();
                }
              }
            })

          }
        },
        error: function() {

        }
      });
    }
  });

  $("#nota").on("keyup", function(e) {
    var code = (e.keyCode || e.which);

    // do nothing if it's an arrow key or backspace
    if (code == 37 || code == 38 || code == 39 || code == 40 || code == 8) {
      return;
    }

    var num = Number(this.value.replace(",", "."));
    if (this.value.replace(",", "").length > 2) num = num * 100;

    var value = (num <= 10 ? num : 10);

    // this.value = value.toFixed(1).replace(".", ",");
    this.value = value.toFixed(1).replace(".", ",");
  });
</script>
<?php
$v->end();
?>
