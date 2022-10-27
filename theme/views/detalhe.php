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
      <div class="table-text">
        <h2>Grupo: <?= $grupo->name ?></h2>
        <p><?= $grupo->description ?></p>
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
            foreach ($entrega as $valor) :
              $prazo_final = date_create($valor->date);
          ?>
              <tr>
                <td><?= $valor->name; ?></td>
                <td>
                  <?php if (!empty($valor->filename)) : ?>
                    <a href="../assets/docs/<?= $valor->filename ?>" download>Baixar Entrega</a>
                  <?php else : ?>
                    Não enviado
                  <?php endif; ?>
                </td>
                <td>
                  <?php
                  if (!empty($valor->date_delivery)) :
                    $prazo_entrega = date_create($valores->date_delivery);

                    echo date_format($prazo_entrega, 'd/m/Y');
                  ?>
                  <?php else : ?>
                    Não enviado
                  <?php endif; ?>
                </td>
                <td><?= date_format($prazo_final, 'd/m/Y'); ?></td>
                <td>
                  <?php
                  if (!empty($valor->note)) : ?>
                    <a href="#!">Adicionar nota</a>
                  <?php else : ?>
                    Não enviado
                  <?php endif; ?>

                </td>
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

</body>
