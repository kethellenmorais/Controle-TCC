<?php
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
      <div class="container">
        <div class="grupo-texto">
          <div>
            <h2>Grupos</h2>
            <p>
              Verifique as entregas de cada grupo.
            </p>
          </div>
          <a href="#new-group" data-toggle="modal" class="abrir-modal" data-target="#new-group">
            <i class="fas fa-plus"></i>
            <b>Adicionar Grupo</b>
          </a>
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

    $v->insert("utils/modal_enviar_entrega.php", ['entregas' => $entregas]);
  ?>

    <section class="section">
      <div class="container">

        <div class="grupo-texto">
          <div class="grupo-detalhe">
            <h2><?= $grupo->name; ?></h2>
            <p><?= $grupo->description ?></p>
          </div>

          <a href="#modal_new_valor" data-toggle="modal" class="abrir-modal" data-target="#modal_new_valor">
            <i class="fas fa-plus"></i>
            <b>Adicionar entrega</b>
          </a>

        </div>

        <div>
          <h3>Entregas Pendentes</h3>
          <p>Acompanhe aqui as entregas que o seu grupo ainda precisa realizar</p>
        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Título da entrega</th>
              <th>Prazo final</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $entrou = "N";
            if (!empty($entregas)) :
              foreach ($entregas as $key => $valor) :
                if (empty($valor->date_delivery) && empty($valor->filename)) :
                  $entrou = "S";
                  $prazo_final = date_create($valor->date);
            ?>
                  <tr>
                    <td><?= $valor->name; ?></td>
                    <td><?= date_format($prazo_final, 'd/m/Y'); ?></td>
                    <td>Não Enviado</td>
                  </tr>
              <?php
                endif;
              endforeach;
            else :

              $entrou = "S";
              ?>
              <tr>
                <td colspan="3" align="center"><b>Não existem entregas cadastradas</b></td>
              </tr>

            <?php
            endif;

            if ($entrou == "N") :
            ?>
              <tr>
                <td colspan="3" align="center"><b>Seu grupo já realizou todas as entregas</b></td>
              </tr>

            <?php
            endif;


            ?>

          </tbody>
        </table>

        <div class="titulo-entregas">
          <h3>Entregas Realizadas</h3>
          <p>Acompanhe aqui as entregas que o seu grupo já realizou</p>
        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Título da entrega</th>
              <th>Integrante</th>
              <th>Arquivo</th>
              <th>Data de Envio</th>
              <th>Prazo final</th>
              <th>Nota</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $entrou = "";
            if (!empty($entregas)) :
              foreach ($entregas as $key => $valor) :
                if (!empty($valor->date_delivery) && !empty($valor->filename)) :
                  $entrou = "TEM";

                  $data_final = date_create($valor->date);
                  $data_entrega = date_create($valor->date_delivery);
            ?>
                  <td class="limit-width-table"><?= $valor->name; ?></td>
                  <td class="limit-width-table"><?= $valor->user; ?></td>
                  <td>
                    <a href="<?= docs("$valor->filename") ?>" download><b>Baixar<i class="fas fa-download"></i></b></a>
                  </td>
                  <td><?= date_format($data_entrega, 'd/m/Y'); ?></td>
                  <td><?= date_format($data_final, 'd/m/Y'); ?></td>
                  <td><b><?= !empty($valor->note) ? $valor->note : "Aguardando" ?></b></td>
                  </tr>
              <?php
                else :
                  $entrou = $entrou != "TEM" ? "NAOENVIOU" : $entrou;
                endif;
              endforeach;
            else :
              ?>
              <tr>
                <td colspan="6" align="center"><b>Não existem entregas cadastradas</b></td>
              </tr>

            <?php
            endif;

            if ($entrou == "N") :
            ?>
              <tr>
                <td colspan="6" align="center"><b>Seu grupo já realizou todas as entregas</b></td>
              </tr>

            <?php
            endif;

            if ($entrou == "NAOENVIOU") :
            ?>
              <tr>
                <td colspan="6" align="center"><b>Seu grupo ainda não realizou nenhuma entrega</b></td>
              </tr>

            <?php
            endif;


            ?>
          </tbody>
        </table>
      </div>
    </section>

  <?php
  endif;
  $v->insert("utils/to_top.php");
  ?>

</div>
