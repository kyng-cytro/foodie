<?php

include('../config/constants.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `admin` WHERE `id` = $id";

    $res = $conn->real_query($sql);

    push_log($conn, "Deleted Admin $id");

    if ($res) {
        $_SESSION['delete'] = '<span class="text-sm font-semibold text-green-500">Admin Deleted Successfully</span>';
    } else {
        $_SESSION['delete'] = '<span class="text-sm font-semibold text-red-500">An Error Occurred while deleting Admin</span>';
    }

    header('location:' . SITEURL . 'admin/manage-admins.php');
} else {
    header('location:' . SITEURL . 'admin/manage-admins.php');
}
