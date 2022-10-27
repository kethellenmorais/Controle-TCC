<div class="modal fade" id="modal_new_task" tabindex="-1" role="dialog" aria-labelledby="modal_new_task" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal_new_task">
          Adicionar entrega
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="modal-input">
            <p>Qual entrega deseja enviar?</p>
            <select class="form-select entregas" name="entrega" aria-label="select example">
              <option selected disabled>Selecione uma opção</option>

              <?php
              if (!empty($tasks)) :
                foreach ($tasks as $task) :
              ?>
                  <option value="<?= $task->id; ?>"><?= $task->name; ?></option>
                <?php

                endforeach;
              else :
                ?>
                <option disabled>Sem entregas Cadastradas</option>

              <?php endif; ?>
            </select>
          </div>
          <div class="modal-input">
            <p>Selecione o documento de envio</p>
            <input type="file" name="file" type="file" id="myFile"></a>
            </td>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>
