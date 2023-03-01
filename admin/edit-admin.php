<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Edit Admin</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `admin` WHERE `id` = $id";

        $res = $conn->query($sql);

        $user = $res->fetch_assoc();

        if (!$user['id']) {
            header('location:' . SITEURL . 'admin/manage-admins.php');
        }

        $full_name = $user['full_name'];
        $username = $user['username'];
    } else {
        header('location:' . SITEURL . 'admin/manage-admins.php');
    }
    ?>
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-6">
            <h2 class="font-bold text-2xl uppercase">Update Admin</h2>

            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];

                $sql = "UPDATE `admin` SET
                `full_name` = '$full_name',
                `username` = '$username',
                `updated_at` = now()
                WHERE `id` = '$id'
                ";

                $res = $conn->real_query($sql);

                if ($res) {
                    $_SESSION['update'] = '<span class="text-sm font-semibold text-green-500">Admin Updated Successfully</span>';
                } else {
                    $_SESSION['update'] = '<span class="text-sm font-semibold text-red-500">An Error Occurred While Updating Admin</span';
                }

                header('location:' . SITEURL . 'admin/manage-admins.php');
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="max-w-3xl">
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input name="username" value="<?php echo $username; ?>" type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                    <input name="full_name" value="<?php echo $full_name; ?>" type="text" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Admin</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>