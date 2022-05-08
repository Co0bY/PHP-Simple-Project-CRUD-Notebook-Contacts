<?php

include_once("Templates/header.php");

?>


<div class="container">
    <?php include_once("Templates/backbtn.html"); ?>
    <h1 class="main-title">Criando Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name"> Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insira o Nome" required>
        </div>
        <div class="form-group">
            <label for="phone"> Número do Contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Insira o Número de Telefone" required>
        </div>
        <div class="form-group">
            <label for="observation"> Observações:</label>
            <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira uma Observação" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>


<?php

include_once("Templates/footer.php");

?>