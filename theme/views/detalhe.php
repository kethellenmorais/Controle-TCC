<?php
// session_start();
$v->layout("_theme");
?>

<body id="top-header">

  <?php
  $v->insert("utils/navbar.php");
  ?>

  <section class="banner-area py-5" id="banner">
    <div class="overlay"></div>
  </section>

  <section class="section">
    <!-- Content -->
    <div class="container">
      <div class="grupo-texto">
        <div class="grupo-detalhe">
          <h2><?= $grupo->name ?></h2>
          <p><?= $grupo->description ?></p>
        </div>

        <a href="#new-note" data-toggle="modal" data-target="#new-note">
          Enviar nota +
        </a>

      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Entrega</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
            <th>Prazo final</th>
            <th>Nota</th>
          </tr>
        </thead>

        <tbody>

          <?php
          if (!empty($entrega)) :
            $v->insert("utils/modal_enviar_nota.php", ['entrega' => $entrega]);

            foreach ($entrega as $valor) :
              $data_entrega = date_create($valor->date_delivery);
              $data_final = date_create($valor->date);
          ?>
              <tr>
                <td><?= $valor->name; ?></td>
                <td>
                  <?php if (!empty($valor->filename)) : ?>
                    <a href="<?= docs("$valor->filename") ?>" download>Baixar Entrega</a>
                  <?php else : ?>
                    Não enviado
                  <?php endif; ?>
                </td>
                <td>
                  <?= !empty($valor->date_delivery) ? date_format($data_entrega, 'd/m/Y') : "Não enviado"; ?>
                </td>
                <td><?= date_format($data_final, 'd/m/Y'); ?></td>
                <td>
                <b>
                  <?php
                  if (!empty($valor->date_delivery)) :
                    if (!empty($valor->note)) : ?>
                      <?= $valor->note; ?>
                    <?php else : ?>
                      Não lançada
                    <?php
                    endif;
                  else :
                    ?>
                    Não enviado
                  <?php endif; ?>
                </b>
                </td>
              </tr>
            <?php
            endforeach;
          else :
            ?>

            <tr>
              <td colspan="5" align="center">Não existem entregas cadastradas</td>
            </tr>

          <?php endif; ?>

        </tbody>
      </table>
    </div>
  </section>

  <?php
  $v->insert("utils/to_top.php");
  ?>

</body>
