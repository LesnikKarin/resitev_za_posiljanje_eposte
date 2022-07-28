<?php include '../backend/loginCode.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Email Sending App</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="../frontend/css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="../frontend/index.php">Email Sending App</a>
      <?php include '../backend/navbar.php' ?>
    </div>
  </nav>

  <?php


  if (isset($_SESSION["user"])) {
    echo '<br>
        <div class="d-flex justify-content-center align-items-center container">
          <div class="col-md-4 col-md-offset-4">
      
            <form method="post" id="form" enctype="multipart/form-data">';
            include '../backend/getSmtp.php';

    echo '<div class="form-group">
                <label for="">Receiver&#039;s email:</label>
                <input type="text" class="form-control" id="receiver" placeholder="Enter receiver(s)" name="receiver">
              </div><br>
              <div class="form-group">
                <label for="">Subject:</label>
                <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject">
              </div><br>
              <div class="form-group">
                <label for="">Body:</label>
                <textarea type="text" class="form-control" id="body" placeholder="Enter body" name="body"></textarea>
              </div><br>
              <div class="form-group">
                <label for="">Add attachment:</label>
                <input type="file" class="form-control-file" id="file" name="file">
              </div><br>

              <input type="submit" class="btn btn-primary" name="button" value="Send" />
      
            </form>';

    if (isset($_POST["button"])) {
      include "../backend/phpMailer.php";
      header("Location: ../frontend/sent.php");
      exit;
    }
  } else {
    echo '<br>
        <div class="d-flex justify-content-center align-items-center container">
          <div>
              <h3>Login to send an email!</h3>   
          </div>
        </div>
        <br>';
  }
  ?>


  </div>
  </div>

  <br>



  <footer class="footer bg-light mt-auto">
    <div class="container">
      <div class="text-center">
        <p class="text-muted small mb-4 mb-lg-0">&copy; Karin Lešnik 2022. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>