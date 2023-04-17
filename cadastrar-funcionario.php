<?php
include('./views/header.php');
include('./app/models/valida-cpf.php');
?>

        <div class="container mt-3 mb-3">
            <h1 class="text-center mb-5">Cadastro de Funcionário</h1>
            <form id="form-cadastro" action="processa-cadastro.php" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="dt-nascimento" class="form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" id="dt-nascimento" name="dt_nascimento" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="number" class="form-control" id="cpf" name="cpf" onblur="validaCPF(this.value)" placeholder="Somente números" required>
                    <span id="cpf-aviso"></span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" onblur="validaEmail(this.value)" placeholder="exemplo@dominio.com" required>
                    <span id="email-aviso"></span>
                </div>
                <div class="mb-3">
                    <label for="estado-civil" class="form-label">Estado civil:</label>
                    <select class="form-select" id="estado-civil" name="estado_civil" required>
                        <option value="">Selecione</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viúvo">Viúvo</option>
                    </select>
                </div>
                <div class="text-center">
                    <p id="aviso-validacao" class="text-danger"></p>
                </div>
                <div class="text-center">
                    <a class="btn btn-danger mx-5 align-middle" href="./index.php">
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
