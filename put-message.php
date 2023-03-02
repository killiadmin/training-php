<?php 
require ('actions/users/checkSessionAction.php');
require ('actions/message/putMessageAction.php');
require ('actions/message/editMessageAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php'; ?>
    <div class="container">
    <?php 
            if (isset($errorMsg)) {
                echo '<p class="p-5">'.$errorMsg.'</p>';
            }
    ?>
    <?php 
    
    if (isset($form_message)){
        ?>
        <form method="post">
        <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Your new title</label>
                    <input type="text"class="form-control" name="title" value="<?= $form_title; ?>">
        </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Your new message</label>
                    <textarea class="form-control" name="message"><?= $form_message; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier le message</button>
                <br><br>
        </form>
        <?php
    };
    ?>
    </div>

</body>
</html>