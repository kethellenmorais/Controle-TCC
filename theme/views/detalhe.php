<?php
session_start();
$v->layout("../_theme");
?>

<body id="top-header">

  <?php
  $v->insert("../utils/navbar.php");
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
          <tr>
            <td>Front</td>
            <td><a href="./images/banner/banner.png" download="">Baixar Entrega</a></td>
            <td>19/10/2022</td>
            <td>19/10/2022</td>
            <td><a href="#!">Adicionar nota</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <?php
  $v->insert("../utils/to_top.php");
  ?>

</body>
