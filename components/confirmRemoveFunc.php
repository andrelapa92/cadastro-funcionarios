<?php

echo "
    <div class='modal fade' id='modalRemoveFunc' tabindex='-1' role='dialog' aria-labelledby='modalRemoveFunc' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Excluir Funcionário</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    Você tem certeza que deseja excluir este funcionário?
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <a onclick='confirmaExclusao()' type='submit' class='btn btn-danger'>Confirmar exclusão</a>
                </div>
            </div>
        </div>
    </div>
";

?>