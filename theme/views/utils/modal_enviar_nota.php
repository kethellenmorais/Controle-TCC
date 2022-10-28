<div class="modal fade" id="new-note" tabindex="-1" role="dialog" aria-labelledby="new-note" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="new-note">
          Enviar nota
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $router->route("app.avaliar"); ?>" method="post">
        <div class="modal-body">
          <div class="modal-input">
            <p>Qual entrega deseja enviar?</p>
            <select class="form-select entregas" required name="entrega" aria-label="select example">
              <?php
              if (!empty($entrega)) :
              ?>
                <option disabled>Selecione uma opção</option>
                <?php

                foreach ($entrega as $valor) :
                  if (empty($valor->note) && !empty($valor->filename)) :
                ?>
                    <option value="<?= $valor->id; ?>"><?= $valor->name; ?></option>
                <?php
                  endif;
                endforeach;
              else :
                ?>
                <option disabled>Sem entregas para avaliar</option>

              <?php endif; ?>
            </select>
          </div>

          <div class="modal-input">
            <p>Nota</p>
            <input type="text" name="nota" id="nota" placeholder="Digite a nota pra entrega..." maxlength="5" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="entrega-button" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>


