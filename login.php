<?php require ('actions/users/loginActions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>
<body>
    <form class="container" method="POST">

    <?php if (isset($errorMsg)) { echo "<p>".$errorMsg."</p>"; } ?>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nickname</label>
        <input type="text" class="form-control" name="nickname">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="validate">Signin</button>
    
    <br><br>

    <a href="signup.php"><p>Sign Up</p></a>
    </form>
</body>
</html>