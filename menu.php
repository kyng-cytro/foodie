<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/output.css" />
    <link rel="stylesheet" href="css/extras.css" />
    <title>Foodie | Menu</title>
</head>

<body class="bg-slate-800 font-montserrat">
    <div class="min-h-screen font-montserrat flex flex-col">
        <?php include('partials/header.php') ?>
        <?php

        $categories = $conn->query("SELECT * FROM `category` WHERE `active` = 1");

        function getFoods($conn, $category_id)
        {
            $foods = $conn->query("SELECT * FROM `food` WHERE `category_id` = $category_id AND `active` = 1");
            return $foods;
        }
        ?>
        <!-- Main Content -->
        <div class="flex-1 lg:py-5 text-gray-400">
            <div class="w-full md:max-w-[80%] mx-auto text-center">
                <?php
                if (isset($_SESSION['added'])) {
                    echo $_SESSION['added'];
                    unset($_SESSION['added']);
                }
                ?>
            </div>
            <!-- Menu -->
            <?php foreach ($categories as $category) : ?>
                <div class="md:max-w-[80%] mx-auto my-10 px-2">
                    <h2 class="text-lg font-semibold mb-3"><?php echo $category['title'] ?></h2>
                    <!-- Product Cards Container -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 items-center md:justify-between">
                        <!-- Product Card -->
                        <?php foreach (getFoods($conn, $category['id']) as $item) : ?>
                            <!-- card component -->
                            <?php include 'partials/food-card.php' ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php include('partials/footer.php') ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>