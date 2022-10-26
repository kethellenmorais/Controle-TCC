<div class="col-lg-4 col-md-6 card-group">
  <div class="blog-box">
    <div class="single-blog">
      <div class="blog-content">
        <a href="#!">
          <h3 class="card-title"><?= $grupo->name ?></h3>
        </a>
        <p><?= $grupo->description ?></p>
        <a href="<?= $router->route("app.detalhe_grupo", ["id" => $grupo->id]); ?>" class="read-more">Ver entregas</a>
      </div>
    </div>
  </div>
</div>
