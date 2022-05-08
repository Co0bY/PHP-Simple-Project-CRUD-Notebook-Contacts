<?php

include_once("Templates/header.php");

?>


<div class="container">
    <?php include_once("Templates/backbtn.html"); ?>
    <h1 class="main-title">Editando Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name"> Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insira o Nome" value="<?= $contact['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="phone"> Número do Contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Insira o Número de Telefone" value="<?= $contact['phone'] ?>" required>
        </div>
        <div class="form-group">
            <label for="observation"> Observações:</label>
            <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira uma Observação" rows="3"><?= $contact['observation'] ?>"</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>


<?php

include_once("Templates/footer.php");

?>