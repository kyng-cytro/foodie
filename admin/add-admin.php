<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Add Admin</title>
</head>

<body class="min-h-screen flex flex-col">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-6">
            <h2 class="font-bold text-2xl uppercase">Add Admin</h2>
            <?php
            if (isset($_POST['submit'])) {
                $username =  $_POST['username'];
                $full_name = $_POST['full_name'];
                $password = md5($_POST['password']);

                $sql = "INSERT INTO admin SET 
                    full_name='$full_name',
                    username='$username',
                    password='$password'
                    ";

                $res = $conn->real_query($sql);

                if ($res) {
                    $_SESSION['add'] = '<span class="text-sm font-semibold text-green-500">Admin Created Successfully</span>';
                } else {
                    $_SESSION['add'] =  "<span class='text-sm font-semibold text-red-500'>$conn->error;</span>";
                }

                header("location:" . SITEURL . 'admin/manage-admins.php');
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="max-w-3xl">
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input name="username" type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Cytro" required>
                </div>
                <div class="mb-6">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                    <input name="full_name" type="text" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John Doe" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="*********" required>
                </div>

                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>