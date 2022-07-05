<?php
      if (isset($_SESSION["uporabnik"])) {
        echo '<a class="btn btn-primary" href="../backend/logout.php">Logout</a>';
      } else {
        echo '<a class="btn btn-primary" href="../frontend/login.php">Login</a>';
      }
?>