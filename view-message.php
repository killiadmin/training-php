<?php 

session_start();
require ('actions/message/viewMessageAction.php'); 
require ('actions/comment/sendCommentAction.php');
require ('actions/comment/viewAllComment.php');

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
            <section class="view-message">
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
                <!-- <div class="card-footer">
                    <a href="#" class="btn btn-primary">Répondre</a>
                </div> -->
            </div>
            </section>
            <section class="view-comments">

                <form class="form-group" method="POST">
                    <div class="mb-3 p-4">

                        <label>Réponse: </label>
                        <textarea class="form-control" name="comment"></textarea>
                        <button class="btn btn-success" type="submit" name="validate">Commenter</button>

                    </div>
                </form>
                <div class="card-header">
                                Section commentaire : 
                </div>

                <?php 
                    while($comment = $getAllComments->fetch()) {
                        ?>
                            <div class="card-body">
                                <?= $comment['comment_content'] ?>
                            </div>
                        <?php

                    }
                
                ?>

            </section>             
            <?php
        }
        ?>

    </div>

</body>
</html>