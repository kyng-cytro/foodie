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
    <title>Foodie | Manage Categories</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <?php
    $sql = 'SELECT * FROM `category`';

    $res = $conn->query($sql);
    ?>

    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-4">
            <h2 class="font-bold text-2xl uppercase">Manage Categories</h2>
            <div>
                <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                ?>
                <?php
                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                ?>
                <?php
                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                ?>
            </div>
            <a href="add-category.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add Category</a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs  uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                S/N
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Featured
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Active
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $key => $category) : ?>
                            <tr class=" border-b bg-gray-900 border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                    <?php echo $key + 1 ?>
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $category['title'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($category['image_name'] != "") : ?>
                                        <img class="h-16 w-16" src="<?php echo '../images/category/' . $category['image_name'] ?>" />
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $category['featured'] == 1 ? 'True' : 'False' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $category['active'] == 1 ? 'True' : 'False' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class=" flex flex-col md:flex-row gap-4 items-center justify-start">
                                        <a href="<?php echo SITEURL . 'admin/edit-category.php?id=' . $category['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="<?php echo SITEURL . 'admin/delete-category.php?id=' . $category['id'] . '&image_name=' . $category['image_name'] ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>