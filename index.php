<?php 
    session_start();
    require('actions/message/getAllMessageAction.php');
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include 'includes/head.php';?>

<body>
    <?php include 'includes/navbar.php';?>

    <div class="container">

        <form method="GET">
            <div class="form-group">
                <input class="form-control me-2 m-3" type="search" name="search">
                <button class="btn btn-outline-success m-3" type="submit">Search</button>
            </div>
        </form>

        <?php 
        
            while($message = $getAllMessage->fetch()){
                ?>

                    <div class="card">
                        <div class="card-header">
                            <?= $message['title']?>
                        </div>
                        <div class="card-body">
                            <?= $message['message']?>
                        </div>
                        <div class="card-body">
                            <a href="view-message.php?id=<?= $message['id'] ;?>" class="btn btn-primary">Afficher</a>
                        </div>
                        <div class="card-footer">

                            Publié par <?= $message['nickname_author']; ?> le <?= $message['date_message'];?>

                        </div>
                    </div>
                    <br>
                <?php

            }

        ?>

    </div>
</body>
</html>