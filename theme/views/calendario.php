<?php
// session_start();

$v->layout("_theme");
?>

<div id="top-header">

  <?php
  $v->insert("utils/navbar.php");
  ?>

  <section class="banner-area py-5" id="banner">
    <div class="overlay"></div>
  </section>

  <div class="modal fade" id="modal_new_task" tabindex="-1" role="dialog" aria-labelledby="modal_new_task" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal_new_task">
           Criar entrega
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= $router->route("app.criar_entregas") ?>" method="post" autocomplete="off">
          <div class="modal-body">
            <div class="modal-input">
              <p>Título da entrega</p>
              <input type="text" name="entrega" placeholder="Digite o título da entrega.." maxlength="30" id="entrega" />
            </div>
            <div class="modal-input">
              <p>Prazo final</p>
              <input type="date" name="prazo_entrega" id="prazo_entrega" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <section class="section">
    <!-- Content -->
    <div class="container">

      <div class="grupo-texto">
        <div>
          <h2>Entregas</h2>
          <p>
            Defina etapas e prazos de entrega para os grupos
          </p>
        </div>

        <a href="#modal_new_task" data-toggle="modal" data-target="#modal_new_task">
          + Criar entrega
        </a>

      </div>
      <table class="table">
        <thead>
          <tr>
            <th width="50%">Título da entrega</th>
            <th width="50%">Prazo final</th>
          </tr>
        </thead>
        <tbody>

          <?php

          if (!empty($entrega)) :
            foreach ($entrega as $valores) :

              $date = date_create($valores->date);
          ?>
              <tr>
                <td><?= $valores->name ?></td>
                <td><?= date_format($date, 'd/m/Y') ?></td>
              </tr>

          <?php

            endforeach;
          endif;

          ?>

        </tbody>
      </table>
    </div>
  </section>

  <?php
  $v->insert("utils/to_top.php");
  ?>

</div>
