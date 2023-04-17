<?php include('./views/header.php'); ?>

<div class='container mt-3 mb-3'>
    <h1 class='text-center mb-5'>Cadastro de funcionários</h1>

    <?php include('./views/tabela.php'); ?>

</div>
<div class='text-center'>
    <a class='btn btn-primary' href='cadastrar-funcionario.php'>
        <span class='material-symbols-outlined'>
            person_add
        </span>
    </a>
</div>

<?php
$jsFile = "index.js";
include('./views/footer.php');
?>
