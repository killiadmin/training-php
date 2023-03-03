<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">My messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="post-message.php">Write a message</a>
        </li>

        <?php 
          if(isset($_SESSION['auth'])){
          ?>
              <li class="nav-item">
                <a class="nav-link" href="mypage.php?id=<?= $_SESSION['id']?>">My profil</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutActions.php">Sign out</a>
            </li>
          <?php
          };
        ?>
        
      </ul>
    </div>
  </div>
</nav>