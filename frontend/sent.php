<!DOCTYPE html>
<html lang="en">
<?php include '../backend/loginCode.php'?>

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
      <?php include '../backend/navbar.php'?>
    </div>
  </nav>

  <br>
  <div class="d-flex justify-content-center align-items-center container">
    <div>
        <h1>Your mail will be send soon!</h1>
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