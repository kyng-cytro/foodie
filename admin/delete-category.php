<?php

include('../config/constants.php');
if (isset($_GET['id']) and isset($_GET['image_name'])) {

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name) {
        $path = "../images/category/" . $image_name;
        $remove = unlink($path);

        if (!$remove) {
            $_SESSION['remove'] = '<span class="text-sm font-semibold text-red-500">Failed to Remove Category Image.</span>';
            header('location:' . SITEURL . 'admin/manage-categories.php');
            die();
        }
    }

    $sql = "DELETE FROM `category` WHERE `id` =$id";

    $res = $conn->real_query($sql);

    if ($res) {
        $_SESSION['delete'] = '<span class="text-sm font-semibold text-green-500">Category Deleted Successfully</span>';
    } else {
        $_SESSION['delete'] = '<span class="text-sm font-semibold text-red-500">An Error Occurred while deleting Category</span>';
    }

    header('location:' . SITEURL . 'admin/manage-categories.php');
} else {
    header('location:' . SITEURL . 'admin/manage-categories.php');
}
