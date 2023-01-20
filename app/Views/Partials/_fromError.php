
<!-- gets flash data with errors of validation from any proces of the controllers -->

<!-- This pice of code will be use in others views, like: -->
<!-- edit, create or somthing else -->

<!-- We need know if the message has defined -->
<?php if(session("validation")): ?>
    <div>
        <!-- get the errors sent from a controller in the redirection -->
        <?= session("validation")->listErrors() ?>
    </div>
    <br>
<?php endif ?>