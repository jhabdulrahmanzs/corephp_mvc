
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
     <h3 class="mx-3"> Zuci Project</h3>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="home.php" class="nav-link px-2 link-secondary">Home</a></li>
      <!-- <li><a href="about.php" class="nav-link px-2 link-dark">About</a></li> -->
      <li><a href="profile_view.php" class="nav-link px-2 link-dark">Profile</a></li>
    </ul>
    <div class="col-md-3 text-end">
      <!-- <button type="button" class="btn btn-outline-primary me-2"><a href="http://localhost/corephp_mvc/application/views/login.php">Login</a></button> -->
      <?php
      if (!isset($_SESSION)) {
        session_start();
      }
      if (!isset($_SESSION['useremail'])) {
        echo '<button type="button" class="btn btn-primary text-white me-2"><a href="http://localhost/corephp_mvc/application/views/login.php" class="text-white">Login</a></button>';
      } else {
        echo '<button type="button" class="btn btn-primary  text-white me-2"><a href="http://localhost/corephp_mvc/application/views/logout.php" class="text-white">Logout</a></button>';
      }
      ?>
      <!-- <button type="button" class="btn btn-link "><a href="http://localhost/corephp_mvc/application/views/register.php">Sign-up</a></button> -->
    </div>
  </header>
