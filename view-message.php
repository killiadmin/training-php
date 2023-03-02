<?php 

session_start();
require ('actions/message/viewMessageAction.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<?php include ('includes/head.php') ?>
<body>
    
    <?php include 'includes/navbar.php' ?>
    <br><br>

    <div class="container">

        <?php 
        if(isset($errorMsg)){ echo $errorMsg; };
        
        if(isset($messageInfos)){
            ?>
             <div class="card" style="width: 36rem;">
                <div class="card-header">
                    <h5 class="card-title fs-1"><?= $message_title ;?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text fs-3"><?= $message_content ;?></p>
                </div>
                <hr>
                <div class="card-body">
                    <p class="card-text fs-6">Écrit par : <?= $message_nicknameAuthor;?></p>
                    <p class="card-text fs-6">Publié le : <?= $message_date ;?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Répondre</a>
                </div>
            </div>             
            <?php
        }
        ?>

    </div>

</body>
</html>