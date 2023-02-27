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
    <link rel="stylesheet" href="css/output.css" />
    <link rel="stylesheet" href="css/extras.css" />
    <title>Foodie | Menu</title>
</head>

<body class="bg-slate-800 font-montserrat">
    <div class="min-h-screen font-montserrat flex flex-col">
        <?php include('partials/header.php') ?>
        <?php

        $categories = $conn->query("SELECT * FROM category WHERE active = 1");

        function getFoods($conn, $category_id)
        {
            $foods = $conn->query("SELECT * FROM food WHERE category_id = $category_id AND active = 1");
            return $foods;
        }
        ?>
        <!-- Main Content -->
        <div class="flex-1 lg:py-5 text-gray-400">
            <!-- Menu -->
            <?php foreach ($categories as $category) : ?>
                <div class="md:max-w-[80%] mx-auto my-10 px-2">
                    <h2 class="text-lg font-semibold mb-3"><?php echo $category['title'] ?></h2>
                    <!-- Product Cards Container -->
                    <div class="flex overflow-x-scroll hide-scroll-bar gap-4 items-center md:justify-between">
                        <!-- Product Card -->
                        <?php foreach (getFoods($conn, $category['id']) as $item) : ?>
                            <!-- card component -->
                            <div class="flex-1 md:max-w-lg bg-slate-900 px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                                <!-- Image & Discount -->
                                <div class="relative">
                                    <img class="w-full rounded-xl aspect-video" src="<?php echo 'images/food/' . $item['image_name'] ?>" alt="<?php echo $item['name'] ?>" />
                                    <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg"><?php echo $item['discount'] ?? rand(5, 25) . '%' ?></p>
                                </div>
                                <!-- Name -->
                                <h1 class="mt-4 text-slate-400 text-base font-semibold cursor-pointer"><?php echo $item['title'] ?></h1>

                                <!-- Ratings -->
                                <div class="flex items-center mt-2.5 mb-5">
                                    <?php for ($x = 0; $x < $item['rating']; $x++) : ?>
                                        <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    <?php endfor ?>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?php echo $item['rating'] . '.0' ?></span>
                                </div>

                                <!-- Price -->
                                <p class="text-xl text-white font-semibold mt-1 space-x-1"><span>₦</span><span><?php echo number_format($item['price'])  ?></span></p>

                                <!-- Button -->
                                <div class="my-4">
                                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?addtocart=' . $item['id'] ?>" class="block text-center mt-4 text-sm md:text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg hover:bg-indigo-800 focus:bg-indigo-800 duration-500">Add to cart</a>
                                </div>
                            </div>
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