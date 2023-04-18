<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once(__DIR__ . '/../config.php');

    if (!$conn) {
        die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
    }

    $nome = $_POST["nome"];
    $dt_nascimento = $_POST["dt_nascimento"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $estado_civil = $_POST["estado_civil"];

    $sql = "INSERT INTO funcionarios (nome, dt_nascimento, cpf, email, estado_civil) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nome, $dt_nascimento, $cpf, $email, $estado_civil);
        mysqli_stmt_execute($stmt);
        header('Location: ../../index.php');
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao cadastrar funcionário: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
