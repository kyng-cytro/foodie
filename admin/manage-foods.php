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
    <title>Foodie | Manage Foods</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>
    <?php
    $foods = $conn->query("SELECT * FROM food")
    ?>
    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-4">
            <h2 class="font-bold text-2xl uppercase">Manage Foods</h2>
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
                <?php
                if (isset($_SESSION['no-food-found'])) {
                    echo $_SESSION['no-food-found'];
                    unset($_SESSION['no-food-found']);
                }
                ?>
            </div>
            <div><a href="add-food.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add Food</a></div>

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
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rating
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
                        <?php foreach ($foods as $key => $food) : ?>
                            <tr class=" border-b bg-gray-900 border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                    <?php echo $key + 1 ?>
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $food['title'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($food['image_name'] != "") : ?>
                                        <img class="h-16 w-16" src="<?php echo '../images/food/' . $food['image_name'] ?>" />
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo "₦" . $food['price'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $food['rating'] . " stars" ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $food['featured'] == 1 ? 'True' : 'False' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $food['active'] == 1 ? 'True' : 'False' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class=" flex flex-col md:flex-row gap-4 items-center justify-start">
                                        <a href="<?php echo SITEURL . 'admin/edit-food.php?id=' . $food['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="<?php echo SITEURL . 'admin/delete-food.php?id=' . $food['id'] . '&image_name=' . $food['image_name'] ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
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