<?php 

session_start(); 
require('actions/users/viewMyPage.php');

?>

<!DOCTYPE html>
<html lang="en">

<?php include ('includes/head.php'); ?>

<body>

<?php include('includes/navbar.php'); ?>

<?php 

if (isset($errorMsg)) { echo $errorMsg; }

if (isset($getUserMessage)) {
    ?>
        <div class="card text-center">
            <div class="card-header h-3">
                <?= $user_nickname ?>
            </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Mon sport préféré c'est l'aqua poney</p>
                </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    <?php
    while($myMessage =  $getUserMessage->fetch()){
        ?>
            <div class="card">
                <div class="card-header">
                    <?= $myMessage['title'] ?>
                </div>
                <div class="card-body">
                    <?= $myMessage['message'] ?>
                </div>
                <div class="card-footer">
                    <?= $myMessage['date_message'] ?>
                </div>
            </div>
        <?php


    };
}
?>;


</body>
</html>