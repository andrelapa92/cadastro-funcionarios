<?php
include('./app/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM funcionarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário removido.";
        header('Location: index.php');
    } else {
        echo "Erro ao remover funcionário: " . $conn->error;
    }
} else {
    echo "Erro ao remover funcionário: parâmetro id não informado.";
}

$conn->close();
?>
