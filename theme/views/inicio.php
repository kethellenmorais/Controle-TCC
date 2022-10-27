<?php
// session_start();

$v->layout("_theme");

?>

<div id="top-header">
  <?php
  $v->insert("utils/navbar.php");
  ?>

  <!-- HERO================================================== -->
  <section class="banner-area py-5" id="banner">
    <div class="overlay"></div>
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12 col-lg-9">
          <div class="banner-content text-center style-2">
            <h1 class="display-4 mb-4">Controle de TCC</h1>
            <p>
              Plataforma para criação de grupos de TCC, subida de arquivos, adição e visualização de notas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php

  if ($_SESSION['user_type'] == 2) :

    $v->insert("utils/modal_criar_grupo.php");

  ?>

    <section class="section">
      <!-- Content -->
      <div class="container">
        <div class="grupo-texto">
          <div>
            <h2>Grupos</h2>
            <p>
              Verifique em detalhes cada grupo de TCC.
            </p>
          </div>
          <a href="#new-group" data-toggle="modal" data-target="#new-group">Adicionar Grupo +</a>
        </div>
        <div class="row justify-content-center lista-grupos">

          <?php

          if (!empty($grupos)) {
            foreach ($grupos as $grupo) {
              $v->insert("utils/card.php", ['grupo' => $grupo]);
            }
          } else {
            echo "<h3>Não tem existem grupos cadastrados na aplicação</h3>";
          }

          ?>

        </div>
      </div>
    </section>

  <?php
  elseif ($_SESSION['user_type'] == 1) :

    $v->insert("utils/modal_enviar_entrega.php");
  ?>

    <section class="section">
      <!-- Content -->
      <div class="container">

        <div class="grupo-texto">
          <div>
            <h2>Suas entregas</h2>
            <p>
              Realize entregas, confira prazos e acompanhe suas notas.
            </p>
          </div>

          <a href="#modal_new_task" data-toggle="modal" data-target="#modal_new_task">
            + Adicionar entrega
          </a>

        </div>

        <p>Antes de realizar a entrega</p>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Título da entrega</th>
              <th>Prazo final</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BackEnd</td>
              <td>21/10/2022</td>
              <td>Pendente</td>
            </tr>
          </tbody>
        </table>


        <p>Depois de realizar a entrega</p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Título da entrega</th>
              <th>Arquivo</th>
              <th>Data de Envio</th>
              <th>Prazo final</th>
              <th>Nota</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>FrontEnd</td>
              <td>Pendende</td>
              <td>Pendende</td>
              <td>19/10/2022</td>
              <td>Pendende</td>
            </tr>
          </tbody>
        </table>


      </div>
    </section>


  <?php
  endif;

  $v->insert("utils/to_top.php");
  ?>

</div>


