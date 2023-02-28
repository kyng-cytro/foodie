<?php
include('config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        if ($_SESSION['cart']) {
            $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] + 1;
        } else {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$id] = ["id" => $id, "quantity" => 1];
        }
    } else {
        $_SESSION['cart'][$id] = ["id" => $id, "quantity" => 1];
    }
    $_SESSION['added'] = '<span class="text-sm font-semibold text-green-500">Item Added To Cart</span>';
}

header('Location:' . $_SERVER['HTTP_REFERER']);
