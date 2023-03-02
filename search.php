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
        if (isset($_GET['query'])) {
            $query = $_GET['query'];

            $sql = "SELECT * FROM `food` WHERE `title` LIKE '%$query%'";

            $foods = $conn->query($sql);
        } else {
            $sql = "SELECT * FROM food";

            $foods = $conn->query($sql);
        }
        ?>
        <div class="flex-1 p-2 md:p-0 lg:py-5 text-gray-400">
            <div class="w-full md:max-w-[80%] mx-auto text-center my-4">
                <?php
                if (isset($_SESSION['added'])) {
                    echo $_SESSION['added'];
                    unset($_SESSION['added']);
                }
                ?>
            </div>
            <div class="flex flex-col items-center justify-center md:max-w-[80%] px-2 md:px-0 md:mx-auto w-full mb-6">
                <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="w-full flex items-center max-w-lg">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="query" value="<?php echo $query ?>" type="text" id="simple-search" class="border text-sm rounded-lg  block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search" required>
                    </div>
                    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
            <?php if ($foods->fetch_array()) : ?>
                <div class="md:max-w-[80%] mx-auto my-10 px-2">
                    <h2 class="text-lg font-semibold mb-3"><?php echo 'Results for ' . ucwords(strtolower($query)) ?></h2>
                    <!-- Product Cards Container -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 items-center md:justify-between">
                        <!-- Product Card -->
                        <?php foreach ($foods as $item) : ?>
                            <!-- card component -->
                            <?php include 'partials/food-card.php' ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="flex items-center justify-center md:max-w-[80%] mx-auto my-10 px-2">
                    <h2 class="text-lg font-semibold mb-3"><?php echo 'No Results for ' . ucwords(strtolower($query)) ?></h2>
                </div>
            <?php endif ?>
        </div>
        <?php include('partials/footer.php') ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>