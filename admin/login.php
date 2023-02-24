<?php require_once('../config/constants.php') ?>

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

<body class="min-h-screen flex flex-col bg-gray-200">
    <div class="h-full flex flex-col items-center justify-center">
        <div class="w-full max-w-2xl space-y-3">
            <h2 class="font-bold text-2xl uppercase text-left w-full md:max-w-2xl px-2 md:px-0">Sign In</h2>
            <div class="w-full max-w-2xl">
                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                ?>
            </div>
        </div>

        <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full">
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $sql = "SELECT * FROM `admin` WHERE username='$username' AND password='$password'";

                $res = $conn->query($sql);

                if ($res->fetch_assoc()['id']) {
                    $_SESSION['login'] = '<span class="text-sm font-semibold text-green-500">Login Successful.</span>';
                    $_SESSION['user'] = $username;
                    header('location:' . SITEURL . 'admin/');
                } else {
                    $_SESSION['login'] = '<span class="text-sm font-semibold text-red-500">Username or Password did not match.</span>';
                    header('location:' . SITEURL . 'admin/login.php');
                }
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="max-w-2xl mx-auto">
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input name="username" type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Cytro" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="********" required>
                </div>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            </form>
        </div>
        <p class="w-full max-w-2xl text-left px-2 text-sm font-thin">Made by <a class=" font-light hover:underline" href="#">John Dibashi</a> for ICS405</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js">
    </script>
</body>

</html>