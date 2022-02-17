<!-- Modal Editar -->
<div class="modal fade" id="editarDisciplina-<?= $disciplina->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Disciplina</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <!--Form Modal Editar-->
            <div class="formularioEditar">
              <form action="/disciplinas/update" method="POST">

                <input type="hidden" name="id" value="<?= $disciplina->id ?>">

                <input class="form-control" type="text" name="disciplina" value="<?= $disciplina->disciplina ?>" placeholder="<?= $disciplina->disciplina ?>">
                <br>
                <input class="form-control" type="text" name="codigo" value="<?= $disciplina->codigo ?>" placeholder="<?= $disciplina->codigo ?>">
                <br>
                <input class="form-control" type="text" name="turma" value="<?= $disciplina->turma ?>" placeholder="<?= $disciplina->turma ?>">
                <br>
                <input class="form-control" type="text" name="professor" value="<?= $disciplina->professor ?>" placeholder="<?= $disciplina->profesor ?>">
                <br>
                <input class="form-control" type="text" name="departamento" value="<?= $disciplina->departamento ?>" placeholder="<?= $disciplina->departamento ?>">
                <br>
                <br>
              </div>
              <!--Fim Form Modal Editar-->
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-warning btn-amarelo">Salvar mudanças</button>
            <button type="button" class="btn btn-warning btn-preto" data-dismiss="modal">Fechar</button>
          </div>
        </form>
        </div>
      </div>
    </div>