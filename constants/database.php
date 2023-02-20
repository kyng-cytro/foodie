<?php
define("DB_HOST", "localhost");
define("DB_USER", "web_user");
define("DB_PASS", "web_pass");
define("DB", 'foodie');
?>

<?php

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
