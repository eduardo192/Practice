<!-- This pice of code will be use in others views, like: -->
<!-- edit, create or somthing else -->

<!-- We need know if the message has defined -->
<?php if(session("mensaje")): ?>
    <div>
        <!-- get the message sent from a controller in the redirection -->
        <?= session("mensaje") ?>
    </div>
    <br>
<?php endif ?>