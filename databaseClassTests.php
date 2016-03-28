<?php
require_once("includes/database.php");

if(isset($database)) { echo "true"; } else { echo "false"; }
echo "<br />";

echo $database->escape_value("It's working?<br />");

// $sql  = "INSERT INTO users (username, password, first_name, last_name) ";
// $sql .= "VALUES ('xakir', 'secretpwd', 'xakir', 'Ullah')";
// $result = $database->query($sql);

$sql = "SELECT * FROM user WHERE user_ID = 1";
$result_set = $database->query($sql);
$found_user = $database->fetch_array($result_set);
echo $found_user['username'];

print_r (getdate());

$database->close_connection();

?>