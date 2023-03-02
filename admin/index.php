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
    <link rel="stylesheet" href="../css/extras.css" />
    <title>Foodie | Admin</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>
    <?php
    $category_count = $conn->query("SELECT COUNT(`id`) AS `count` FROM `category`")->fetch_assoc()['count'];
    $food_count = $conn->query("SELECT COUNT(`id`) AS `count` FROM `food`")->fetch_assoc()['count'];
    $order_count = $conn->query("SELECT COUNT(`id`) AS `count` FROM `order`")->fetch_assoc()['count'];
    $revenue_count = $conn->query("SELECT SUM(`total`) AS `revenue` FROM `order` WHERE `status` = 'delivered'")->fetch_assoc()['revenue'];
    $histories = $conn->query("SELECT * FROM `history` LIMIT 10");
    $histories_array = $histories->fetch_array();
    ?>
    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1 flex">
        <div class="flex flex-col space-y-6 flex-1">
            <h2 class="font-bold text-2xl uppercase">Dashboard</h2>

            <div class="grid gap-3 grid-cols-2 md:grid-cols-4">
                <a href="<?php echo SITEURL . 'admin/manage-categories.php' ?>" title="Total number of categories" class=" bg-slate-300 py-8 px-8 text-center rounded-md hover:bg-slate-400">
                    <h3 class=" font-semibold text-xl"><?php echo $category_count ?? 0 ?></h3>
                    <p class=" text-sm text-slate-700">Categories</p>
                </a>
                <a href="<?php echo SITEURL . 'admin/manage-foods.php' ?>" title="Total number of foods" class=" bg-slate-300 py-8 px-8 text-center rounded-md hover:bg-slate-400">
                    <h3 class=" font-semibold text-xl"><?php echo $food_count ?? 0 ?></h3>
                    <p class=" text-sm text-slate-700">Foods</p>
                </a>
                <a href="<?php echo SITEURL . 'admin/manage-orders.php' ?>" title="Total number of orders" class=" bg-slate-300 py-8 px-8 text-center rounded-md hover:bg-slate-400">
                    <h3 class=" font-semibold text-xl"><?php echo $order_count ?? 0 ?></h3>
                    <p class=" text-sm text-slate-700">Orders</p>
                </a>
                <a href="<?php echo SITEURL . 'admin/manage-orders.php' ?>" title="Sum total of all delivered order" class=" bg-slate-300 py-8 px-8 text-center rounded-md hover:bg-slate-400">
                    <h3 class=" font-semibold text-xl space-x-1"><span>₦</span><span><?php echo number_format($revenue_count) ?? 0 ?></span></h3>
                    <p class=" text-sm text-slate-700">Revenue</p>
                </a>
            </div>

            <h2 class="font-medium text-lg">History</h2>
            <div class="w-full flex-1 bg-slate-300 p-4 rounded-md">
                <?php if ($histories->fetch_array()) : ?>
                    <?php foreach ($histories as $key => $history) : ?>
                        <div class="p-2 rounded-md hover:bg-slate-400 hover:text-slate-100 cursor-pointer space-x-1">
                            <span class=" font-semibold"><?php echo $history['user'] ?></span>
                            <span class=" text-sm lowercase"><?php echo $history['message'] ?></span>
                        </div>
                        <?php if ($key + 1 != count($histories_array)) : ?>
                            <hr class="h-px my-2 border-0 bg-gray-700">
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="p-4 flex h-full justify-center items-center">
                        <p class=" font-semibold text-lg">Nothing to show</p>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>