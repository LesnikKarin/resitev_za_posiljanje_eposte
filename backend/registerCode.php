<?php include '../backend/loginCode.php';
include '../backend/config.php';

$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
} else {
	mysqli_set_charset($conn, 'utf8');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$trimmed = array_map('trim', $_POST);
	$fn = $ln = $e = $p = FALSE;

  if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['name'])) {
		$fn = mysqli_real_escape_string ($conn, $trimmed['name']);
	} else {
		echo '<div class="alert alert-warning" role="alert">Prosim vnesite ime!</div>';
	}
  if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['surname'])) {
		$ln = mysqli_real_escape_string ($conn, $trimmed['surname']);
	} else {
		echo '<div class="alert alert-warning" role="alert">Prosim vnesite priimek!</div>';
	}
  if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($conn, $trimmed['email']);
	} else {
		echo '<div class="alert alert-warning" role="alert">Prosim vnesite veljaven email naslov!</div>';
	}
  if (preg_match ('/^\w{4,20}$/', $trimmed['password']) ) {
		if ($trimmed['password'] == $trimmed['password']) {
			$p = mysqli_real_escape_string ($conn, $trimmed['password']);
		} else {
			echo '<div class="alert alert-warning" role="alert">Gesli se ne ujemata!</div>';
		}
	} else {
		echo '<div class="alert alert-warning" role="alert">Prosim vnesite veljavno geslo!</div>';
	}
  if ($fn && $ln && $e && $p) {

		$q = "SELECT idUporabnik FROM uporabnik WHERE email='$e'";
		$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

    if (mysqli_num_rows($r) == 0) {
			$a = md5(uniqid(rand(), true));
			$q = "INSERT INTO uporabnik (ime, priimek, email, geslo) VALUES ('$fn', '$ln', '$e', SHA1('$p'))";
			$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

      if (mysqli_affected_rows($conn) == 1) {
				$url = '../frontend/login.php';
				echo '<div class="alert alert-success" role="alert">Hvala za registracijo!</div>';
    			ob_end_clean();
				header("Location: $url");
				exit();
			} else {
				echo '<div class="alert alert-danger" role="alert">Registracija ni uspela. Za nevšečnosti se opravičujemo!</div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">Ta elektronski naslov je že zaseden!</div>';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">Prosimo, poskusite ponovno!</div>';
	}
}
?>