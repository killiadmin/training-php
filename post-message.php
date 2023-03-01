<?php 

require("actions/message/sendMessageAction.php");
require("actions/users/checkSessionAction.php"); 


?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>
<body>
    <?php include "includes/navbar.php"; ?>
    <form class="container" method="POST">

        <?php 
        if (isset($errorMsg)) { 
            echo "<p>".$errorMsg."</p>";
        } elseif (isset($successMsg)){
            echo "<p>".$successMsg."</p>";
        }
        ?>
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your title</label>
                <input type="text"class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your message ...</label>
                <textarea class="form-control" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Send</button>

            <br><br>
    </form>
</body>
</html>