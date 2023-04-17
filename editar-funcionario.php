<!DOCTYPE html>
<html>

<?php
    require_once './app/config.php';

    $funcionario_id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($funcionario_id !== null) {
        $query = "SELECT * FROM funcionarios WHERE id =". $funcionario_id;
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $funcionario = $result->fetch_assoc();
        } else {
            echo "Funcionário não encontrado.";
        }
    } else {
        echo "ID do funcionário não foi fornecido.";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $estado_civil = $_POST['estado_civil'];

        $query = "UPDATE funcionarios SET nome = '$nome', dt_nascimento = '$dt_nascimento', cpf = '$cpf', email = '$email', estado_civil = '$estado_civil' WHERE id =" . $funcionario_id;
        $conn->query($query);
        if ($conn->query($query) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar registro: " . $conn->error;
        }

        header('Location: index.php');
        exit();
    }
    include('./views/header.php');
?>

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
$jsFile = "cadastrar-funcionario.js";
include('./views/footer.php');
?>