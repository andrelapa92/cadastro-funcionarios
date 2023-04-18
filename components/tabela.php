<?php
    require_once(__DIR__ . '/../app/config.php');
    include('confirmRemoveFunc.php');

    $sql = "SELECT id, nome, dt_nascimento, cpf, email, estado_civil FROM funcionarios";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Estado Civil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
        ";

        while($row = $result->fetch_assoc()) {
            
            echo "
                <tbody>
                    <tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . date('d/m/Y', strtotime($row['dt_nascimento'])) . "</td>
                        <td>" . $row["cpf"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["estado_civil"] . "</td>
                        <td>
                            <a class='btn btn-warning' href='editar-funcionario.php?id=" . $row["id"] . "'>
                                <span class='material-symbols-outlined'>
                                    manage_accounts
                                </span>
                            </a>
                            <button onclick='clickedId(" . $row["id"] . ")' type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalRemoveFunc'>
                                <span class='material-symbols-outlined'>
                                    person_remove
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            ";
        }

    echo "</table>";

    } else {
        echo "<p class='text-center'>Nenhum funcionário cadastrado. Clique no botão abaixo para começar.</p>";
    }

    $conn->close();
?>
