<?php
    require_once(__DIR__ . '/../config.php');

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
    include('./components/header.php');
?>