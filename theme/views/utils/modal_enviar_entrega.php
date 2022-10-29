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
      <form action="<?= $router->route("app.upload") ?>" id="form_file" method="post" enctype="multipart/form-data">
        <input type="hidden" type="text" id="validador" class="arquivo_validador" value="SIM">
        <input type="hidden" type="text" value="<?= $grupo->name; ?>" name="nome_grupo" id="nome_grupo">
        <input type="hidden" type="text" value="vazio" name="filename" id="filename">
        <input type="hidden" type="text" value="<?= url("/theme/views/utils/arquivo.php") ?>" id="enviaArquivo">
        <div class="modal-body">
          <div class="modal-input">
            <p>Qual entrega deseja enviar?</p>
            <select class="form-select entregas" required id="Entrega" name="entrega" aria-label="select example">
              <option disabled>Selecione uma opção</option>

              <?php
              if (!empty($tasks)) :

                foreach ($tasks as $key => $task) :
                  if (empty($task->date_delivery) && empty($task->filename)) :
              ?>
                    <option value="<?= $task->id; ?>"><?= $task->name; ?></option>
                <?php
                  endif;
                endforeach;
              else :
                ?>
                <option disabled>Sem entregas Cadastradas</option>

              <?php endif; ?>
            </select>
          </div>
          <div class="modal-input">
            <p>Selecione o documento de envio</p>
            <input type="file" accept="application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, apapplication/msword, text/plain, application/zip" required name="arquivo" id="myFile"></a>
            </td>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="entrega-button" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>
