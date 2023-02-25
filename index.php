<?php session_start() ?>
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
  <title>Home | Foodie</title>
</head>

<?php
$items = [
  ['id' => 1, 'img' => 'images/foods/food_image_1.jpg', 'name' => 'King Burger', 'price' => '12200', 'discount' => '15%'],
  ['id' => 2, 'img' => 'images/foods/food_image_2.jpg', 'name' => '5 drum sticks', 'price' => '5920', 'discount' => '25%'],
  ['id' => 3, 'img' => 'images/foods/food_image_3.jpg', 'name' => 'Pasta', 'price' => '18525', 'discount' => '20%']
]
?>

<?php
function addToCart($id)
{
  $_SESSION['cart'] = $id;
  header('location: ' . $_SERVER['PHP_SELF']);
}


if (isset($_GET['addtocart'])) {
  addToCart($_GET['addtocart']);
}
?>

<body class="bg-slate-800 font-montserrat">
  <div class="min-h-screen font-montserrat flex flex-col">
    <?php include('partials/header.php') ?>
    <!-- Main Content -->
    <div class="flex-1 lg:py-5 text-gray-400">
      <!-- Carousel -->
      <div id="indicators-carousel" class="relative md:max-w-[80%] mx-auto" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-64 overflow-hidden rounded-lg md:h-[31rem]">
          <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="images/covers/cover_image_1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="images/covers/cover_image_2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="images/covers/cover_image_3.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
          <!-- Item 4 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="images/covers/cover_image_4.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
          <!-- Item 5 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="images/covers/cover_image_5.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
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
      <!-- Today's Specials -->
      <div class="md:max-w-[80%] mx-auto my-10 px-2">
        <h2 class="text-lg font-semibold mb-3">Today's Specials</h2>
        <!-- Product Cards Container -->
        <div class="flex overflow-x-scroll hide-scroll-bar gap-4 items-center md:justify-between">
          <!-- Product Card -->
          <?php foreach ($items as $item) : ?>
            <!-- card component -->
            <div class="max-w-lg bg-slate-900 px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
              <!-- Image & Discount -->
              <div class="relative">
                <img class="w-full rounded-xl aspect-video" src="<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>" />
                <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg"><?php echo $item['discount'] ?></p>
              </div>
              <!-- Name -->
              <h1 class="mt-4 text-slate-400 text-base font-semibold cursor-pointer"><?php echo $item['name'] ?></h1>
              <!-- Ratings -->
              <div class="flex items-center mt-2.5 mb-5">
                <?php for ($x = 0; $x <= 5; $x++) : ?>
                  <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                  </svg>
                <?php endfor ?>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
              </div>

              <!-- Price -->
              <p class="text-xl text-white font-semibold mt-1 space-x-1"><span>₦</span><span><?php echo $item['price'] ?></span></p>

              <!-- Button -->
              <div class="my-4">
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?addtocart=' . $item['id'] ?>" class="block text-center mt-4 text-sm md:text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg hover:bg-indigo-800 focus:bg-indigo-800 duration-500">Add to cart</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- Healthy Options -->
      <div class="md:max-w-[80%] mx-auto my-10 px-2">
        <h2 class="text-lg font-semibold mb-3">Healthy Options</h2>
        <!-- Product Cards Container -->
        <div class="flex overflow-x-scroll hide-scroll-bar gap-4 items-center md:justify-between">
          <!-- Product Card -->
          <?php foreach ($items as $item) : ?>
            <!-- card component -->
            <div class="max-w-lg bg-slate-900 px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
              <!-- Image & Discount -->
              <div class="relative">
                <img class="w-full rounded-xl aspect-video" src="<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>" />
                <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg"><?php echo $item['discount'] ?></p>
              </div>
              <!-- Name -->
              <h1 class="mt-4 text-slate-400 text-base font-semibold cursor-pointer"><?php echo $item['name'] ?></h1>
              <!-- Ratings -->
              <div class="flex items-center mt-2.5 mb-5">
                <?php for ($x = 0; $x <= 5; $x++) : ?>
                  <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                  </svg>
                <?php endfor ?>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
              </div>

              <!-- Price -->
              <p class="text-xl text-white font-semibold mt-1 space-x-1"><span>₦</span><span><?php echo $item['price'] ?></span></p>

              <!-- Button -->
              <div class="my-4">
                <button class="mt-4 text-sm md:text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg hover:bg-indigo-800 focus:bg-indigo-800 duration-500">Add to cart</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- Best Sellers -->
      <div class="md:max-w-[80%] mx-auto my-10 px-2">
        <h2 class="text-lg font-semibold mb-3">Best Sellers</h2>
        <!-- Product Cards Container -->
        <div class="flex overflow-x-scroll hide-scroll-bar gap-4 items-center md:justify-between">
          <!-- Product Card -->
          <?php foreach ($items as $item) : ?>
            <!-- card component -->
            <div class="max-w-lg bg-slate-900 px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
              <!-- Image & Discount -->
              <div class="relative">
                <img class="w-full rounded-xl aspect-video" src="<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>" />
                <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg"><?php echo $item['discount'] ?></p>
              </div>
              <!-- Name -->
              <h1 class="mt-4 text-slate-400 text-base font-semibold cursor-pointer"><?php echo $item['name'] ?></h1>
              <!-- Ratings -->
              <div class="flex items-center mt-2.5 mb-5">
                <?php for ($x = 0; $x <= 5; $x++) : ?>
                  <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                  </svg>
                <?php endfor ?>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
              </div>

              <!-- Price -->
              <p class="text-xl text-white font-semibold mt-1 space-x-1"><span>₦</span><span><?php echo $item['price'] ?></span></p>

              <!-- Button -->
              <div class="my-4">
                <button class="mt-4 text-sm md:text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg hover:bg-indigo-800 focus:bg-indigo-800 duration-500">Add to cart</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php include('partials/footer.php') ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>