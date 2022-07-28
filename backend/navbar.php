<?php
      if (isset($_SESSION["user"])) {
        echo '
        <div>
        <a class="btn btn-secondary" href="../frontend/smtp.php">SMTP</a>
        <a class="btn btn-primary" href="../backend/logout.php">Logout</a>
        </div>';
      } else {
        echo '<a class="btn btn-primary" href="../frontend/login.php">Login</a>';
      }
?>