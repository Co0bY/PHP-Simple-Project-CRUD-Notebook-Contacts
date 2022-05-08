<?php

include_once("Templates/header.php");

?>

<div class="container" id="view-contact-container">
    <?php include_once("Templates/backbtn.html"); ?>
    <h1 class="main-title"><?= $contact['name'] ?></h1>
    <p class="bold">Telefone:</p>
    <p><?= $contact['phone'] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contact['observation'] ?></p>
</div>

<?php

include_once("Templates/footer.php");

?>