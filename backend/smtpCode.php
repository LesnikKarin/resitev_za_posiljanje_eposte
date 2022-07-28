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
	$h = $u = $p = FALSE;
    echo '<div class="alert alert-danger" role="alert">test!</div>';

    $h = mysqli_real_escape_string ($conn, $trimmed['host']);
    $u = mysqli_real_escape_string ($conn, $trimmed['username']);
    $p = mysqli_real_escape_string ($conn, $trimmed['password']);

  if ($h && $u && $p) {
		$q = "SELECT idHost FROM host WHERE username='$u'";
		$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

    if (mysqli_num_rows($r) == 0) {
			$q = "INSERT INTO host (host, username, password) VALUES ('$h', '$u', SHA1('$p'))";
			$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

      if (mysqli_affected_rows($conn) == 1) {
				$url = '../frontend/index.php';
				echo '<div class="alert alert-success" role="alert">Saved!</div>';
    			ob_end_clean();
				header("Location: $url");
				exit();
			} else {
				echo '<div class="alert alert-danger" role="alert">Try again!</div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">This host is already in use!</div>';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">Please, try again!</div>';
	}
}
?>