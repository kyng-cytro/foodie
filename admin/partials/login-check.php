<?php
if (!$_SESSION['user']) {
    $_SESSION['no-login-message'] = '<span class="text-sm font-semibold text-red-500">Please login to access Admin Panel.</span>';
    header('location:' . SITEURL . 'admin/login.php');
}
