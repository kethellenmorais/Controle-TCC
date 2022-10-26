<div class="modal fade" id="new-group" tabindex="-1" role="dialog" aria-labelledby="new-group" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="new-group">
            Crie um novo grupo
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="get" autocomplete="off">
          <div class="modal-body">
            <div class="modal-input">
              <p>Nome do grupo</p>
              <input type="text" name="nome" placeholder="Digite o nome do grupo" required />
            </div>
            <div class="modal-input">
              <p>Descrição</p>
              <textarea class="descricao" placeholder="Digite a descrição do grupo" required name="descricao" cols="30" maxlength="250"></textarea>
            </div>

            <div class="modal-input">
              <p>Integrantes</p>
              <select class="form-select" required multiple="multiple" name="integrantes[]" aria-label="select">

                <?php
                if (!empty($alunos)) :
                  foreach ($alunos as $aluno) :
                ?>
                    <option value="<?= $aluno->id ?>"><?= $aluno->name ?></option>
                  <?php
                  endforeach;
                else :
                  ?>

                  <option disabled >Sem alunos cadastrados</option>

                <?php
                endif;
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
