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
  <title>Foodie | Home</title>
</head>

<body class="bg-slate-800 font-montserrat">
  <div class="min-h-screen font-montserrat flex flex-col">
    <?php include('partials/header.php') ?>
    <?php
    $featured_category = $conn->query("SELECT * FROM `category` WHERE `active` = 1 AND `featured` = 1 LIMIT 3");

    $banner_category = $conn->query("SELECT * FROM `category` WHERE `id` = 19 OR `id`  = 30 OR `id` = 32");

    function getFoods($conn, $category_id)
    {
      $foods = $conn->query("SELECT * FROM `food` WHERE `category_id` = $category_id AND `active` = 1 AND `featured` = 1 LIMIT 5");
      return $foods;
    }
    ?>
    <!-- Main Content -->
    <div class="flex-1 lg:py-5 text-gray-400">
      <div class="w-full md:max-w-[80%] mx-auto text-center my-4">
        <?php
        if (isset($_SESSION['added'])) {
          echo $_SESSION['added'];
          unset($_SESSION['added']);
        }
        ?>
        <?php
        if (isset($_SESSION['order_error'])) {
          echo $_SESSION['order_error'];
          unset($_SESSION['order_error']);
        }
        ?>
      </div>
      <!-- TODO: make this use featured categories image -->
      <!-- Carousel -->
      <div id="indicators-carousel" class="relative md:max-w-[80%] mx-auto" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-64 overflow-hidden rounded-lg md:h-[31rem]">
          <!-- Item 1 -->
          <?php foreach ($banner_category as $category) : ?>
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="<?php echo 'images/category/' . $category['image_name'] ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
          <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>

      <!-- Specials -->
      <?php foreach ($featured_category as $featured) : ?>
        <div class="md:max-w-[80%] mx-auto my-10 px-2">
          <h2 class="text-lg font-semibold mb-3"><?php echo $featured['title'] ?></h2>
          <!-- Product Cards Container -->
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 items-center md:justify-between">
            <!-- Product Card -->
            <?php foreach (getFoods($conn, $featured['id']) as $item) : ?>
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