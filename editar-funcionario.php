<?php
require_once(__DIR__ . '/app/models/modelEditFunc.php');
?>

<!DOCTYPE html>
<html>

<div class="container mt-3 mb-3">
    <h1 class="text-center mb-5">Editar Funcionário</h1>
    <form id="form-cadastro" action="editar-funcionario.php?id=<?php echo $funcionario_id; ?>" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome completo:</label>
            <input class="form-control" type="text" name="nome" value="<?= $funcionario['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="dt-nascimento" class="form-label">Data de nascimento:</label>
            <input class="form-control" type="date" name="dt_nascimento" value="<?= $funcionario['dt_nascimento'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="number" class="form-control" id="cpf" name="cpf" value="<?= $funcionario['cpf'] ?>" onblur="validaCPF(this.value)" placeholder="Somente números" required>
            <span id="cpf-aviso"></span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $funcionario['email'] ?>" onblur="validaEmail(this.value)" placeholder="exemplo@dominio.com" required>
            <span id="email-aviso"></span>
        </div>
        <div class="mb-3">
            <label for="estado-civil" class="form-label">Estado civil:</label>
            <select class="form-select" name="estado_civil">
                <option value="Solteiro" <?= $funcionario['estado_civil'] == 'Solteiro' ? 'selected' : '' ?>>Solteiro</option>
                <option value="Casado" <?= $funcionario['estado_civil'] == 'Casado' ? 'selected' : '' ?>>Casado</option>
                <option value="Divorciado" <?= $funcionario['estado_civil'] == 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                <option value="Viúvo" <?= $funcionario['estado_civil'] == 'Viúvo' ? 'selected' : '' ?>>Viúvo</option>
            </select>
        </div>
        <div class="text-center">
            <p id="aviso-validacao" class="text-danger"></p>
        </div>
        <div class="text-center">
            <a class="btn btn-danger mx-5" href="./index.php">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                Voltar
            </a>
            <button id="botao-salvar" type="submit" class="btn btn-primary">
                <span class="material-symbols-outlined">
                    save
                </span>
                Salvar
            </button>
        </div>
    </form>
</div>

<?php
$jsFile = "script.js";
include('./components/footer.php');
?>