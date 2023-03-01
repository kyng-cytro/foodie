<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Reset Password</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE `id` = $id";

    $res = $conn->query($sql);

    if (!$res) {
        header('location:' . SITEURL . 'admin/manage-admins.php');
    }

    $user = $res->fetch_assoc();

    $hash = $user['password'];
    ?>

    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-6">
            <h2 class="font-bold text-2xl uppercase">Reset Password</h2>


            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                $sql = "SELECT * FROM `admin` WHERE `id` = $id AND `password` = '$current_password'";

                $res = $conn->query($sql);

                if ($res->fetch_assoc()['id'] == $id) {

                    if ($new_password == $confirm_password) {

                        $sql = "UPDATE `admin` SET 
                            `password`='$new_password',
                            `updated_at` = now()
                            WHERE `id` = $id
                        ";

                        $res = $conn->query($sql);

                        if ($res) {
                            $_SESSION['change-pwd'] = '<span class="text-sm font-semibold text-green-500">Password Changed Successfully. </span>';
                            header('location:' . SITEURL . 'admin/manage-admins.php');
                        } else {
                            $_SESSION['change-pwd'] = '<span class="text-sm font-semibold text-red-500">Failed To Change Password. </span>';
                            header('location:' . SITEURL . 'admin/manage-admins.php');
                        }
                    } else {
                        $_SESSION['pwd-not-match'] = '<span class="text-sm font-semibold text-red-500">Password Did Not Match. </span>';
                        header('location:' . SITEURL . 'admin/manage-admins.php');
                    }
                } else {
                    $_SESSION['user-not-found'] = '<span class="text-sm font-semibold text-red-500">User Not Found. </span>';
                    header('location:' . SITEURL . 'admin/manage-admins.php');
                }
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="max-w-3xl">
                <div class="mb-6">
                    <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 ">Current Password</label>
                    <input name="current_password" type="password" id="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="********" required>
                </div>
                <div class="mb-6">
                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                    <input name="new_password" type="password" id="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="********" required>
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                    <input name="confirm_password" type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="********" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>