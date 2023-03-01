<?php require("actions/users/signupActions.php"); ?>
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
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">FirstName</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Submit</button>

        <br><br>

        <a href="login.php"><p>Sign In</p></a>
    </form>
</body>
</html>