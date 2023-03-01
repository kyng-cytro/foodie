<?php
ob_start();
session_start();


define("SITEURL", "http://localhost/foodie/");
define("DB_HOST", "localhost");
define("DB_USER", "web_user");
define("DB_PASS", "web_pass");
define("DB", 'foodie');
?>

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);

if ($conn->connect_error) {
    echo "Here";
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
function push_log($conn, $message)
{
    $user  = $_SESSION['user'] ?? "System";
    $conn->real_query("INSERT INTO `history` SET `message` = '$message', `user` = '$user'");
}
?>
