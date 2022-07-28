<?php
include '../backend/loginCode.php';
include '../backend/config.php';

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
} else {
    mysqli_set_charset($conn, 'utf8');
}
$query = "SELECT username FROM host";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<label>Select SMTP parameters:</label>
<select class="form-select" aria-label="Default select example" name="host" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
    <option selected>Select</option>
    <?php
    foreach ($options as $option) {
    ?>
        <option><?php echo $option['username'];
                $username = $option['username'] ?> </option>
    <?php
    }
    ?>
</select>
<input type="hidden" name="host" id="text_content" value="" />
<br>