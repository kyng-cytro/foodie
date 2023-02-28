<?php
include('config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart'][$id]);
    }
}
header("location: " . SITEURL . 'cart.php');
