<?php 

require('actions/users/checkSessionAction.php'); 
require('actions/message/profilAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
    <?php
        while($messages = $getAllMessages->fetch()) {
            ?>
                <br><br>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title"><?= $messages['title'] ?></h5>
                    <p class="card-text"><?= $messages['message'] ?></p>
                    </div>
                    <div class="container m-2">
                    <a href="#" class="btn btn-primary">Répondre</a>
                    <a href="put-message.php?id=<?=$messages['id']?>" class="btn btn-secondary">Modifier</a>
                    <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>


                </div>
            <?php
        }
    ?>
    </div>


</body>
</html>