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
    <title>Foodie | Cart</title>
</head>

<body class="bg-slate-800 font-montserrat">
    <div class="min-h-screen font-montserrat flex flex-col">
        <?php include('partials/header.php') ?>
        <?php
        $total = 0;
        $items = array();
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        function get_food_info($conn, $id)
        {
            return $conn->query("SELECT * FROM `food` WHERE `id` = $id");
        }
        ?>
        <div class="flex-1 lg:py-5 text-gray-400">
            <div class="md:max-w-[80%] mx-auto my-10 px-2">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Cart -->
                    <div class=" bg-slate-900 md:col-span-2 p-4 rounded-lg">
                        <h2 class=" text-lg font-semibold">Cart</h2>
                        <hr class="h-px my-2 border-0 bg-gray-700">
                        <?php if ($cart) : ?>
                            <div class="space-y-6">
                                <?php foreach ($cart as $item) : ?>
                                    <?php foreach (get_food_info($conn, $item['id']) as $food) : ?>
                                        <?php
                                        if (isset($items)) {
                                            $items[count($items)] = [
                                                "title" => $food['title'],
                                                "image_name" => $food['image_name'],
                                                "price" => $food['price'],
                                                "quantity" => $item['quantity']
                                            ];
                                        } else {
                                            $items[0] = [
                                                "title" => $food['title'],
                                                "image_name" => $food['image_name'],
                                                "quantity" => $item['quantity']
                                            ];
                                        }
                                        ?>
                                        <?php
                                        $total = $total + ($food['price'] * $item['quantity']);
                                        ?>
                                        <div class="flex justify-between py-2">
                                            <div class="flex gap-2">
                                                <img class="w-28 h-28 rounded-md" src="<?php echo 'images/food/' . $food['image_name'] ?>" alt="<?php echo $food['title'] ?>" />
                                                <div>
                                                    <h3 class=" text-lg font-semibold"><?php echo $food['title'] ?></h3>
                                                    <p class=" text-sm mt-1 font-medium">quantity: <?php echo $item['quantity'] ?></p>
                                                    <div class="flex items-center mt-1">
                                                        <?php for ($x = 0; $x < $food['rating']; $x++) : ?>
                                                            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                </path>
                                                            </svg>
                                                        <?php endfor ?>
                                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?php echo $food['rating'] . '.0' ?></span>
                                                    </div>
                                                    <p class="text-lg text-white font-semibold mt-1  space-x-1"><span>₦</span><span><?php echo number_format($food['price'])  ?></span></p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <a href="<?php echo SITEURL . 'cart-remove-item.php?id=' . $food['id'] ?>" class="flex text-sm gap-2 items-center p-1.5 hover:bg-slate-700 rounded-md">
                                                    <svg fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                    </svg>
                                                    <span class="hidden sm:block"> Remove </span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php if ($item != end($cart)) : ?>
                                            <hr class="w-48 h-1 mx-auto my-2 border-0 bg-gray-800">
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </div>
                        <?php else : ?>
                            <p class="flex justify-center items-center p-4">No Items added</p>
                        <?php endif ?>
                    </div>
                    <!-- Checkout -->
                    <div class=" bg-slate-900 p-4 rounded-lg">
                        <?php
                        if (isset($_POST['checkout'])) {
                            $customer_name = $_POST['customer_name'];
                            $customer_email = $_POST['customer_email'];
                            $customer_phone = $_POST['customer_phone'];
                            $customer_address = $_POST['customer_address'];
                            $items = $_POST['items'];
                            $total = $_POST['total'];
                            $order_date = date('Y-m-d H:i:s');
                            $status = "pending";

                            $sql = "INSERT INTO `order` SET 
                            `customer_name`='$customer_name',
                            `customer_email`='$customer_email',
                            `customer_phone`='$customer_phone',
                            `customer_address`='$customer_address',
                            `items`='$items',
                            `total`='$total',
                            `order_date`='$order_date',
                            `status`='$status'
                            ";

                            $res = $conn->real_query($sql);

                            if ($res) {
                                unset($_SESSION['cart']);
                                header("location:" . SITEURL . 'order-placed.php');
                            } else {
                                $_SESSION['order_error'] =  "<span class='text-sm font-semibold text-red-500'>Error Occurred While Trying to Place Your Order</span>";
                                header("location:" . SITEURL);
                            }
                        }
                        ?>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <h2 class=" text-lg font-semibold">Checkout</h2>
                            <hr class="h-px my-2 border-0 bg-gray-700">
                            <?php if ($cart) : ?>
                                <div class="space-y-5">
                                    <div class="flex justify-between items-center py-2">
                                        <div>
                                            <p class=" text-lg font-medium">Subtotal</p>
                                            <p class=" text-sm font-light">Delivery fees not included yet.</p>
                                        </div>
                                        <p class="text-lg text-white font-semibold mt-1  space-x-1"><span>₦</span><span><?php echo number_format($total)  ?></span></p>
                                    </div>
                                    <div class="relative inline-flex items-center justify-center w-full">
                                        <hr class="w-64 h-px my-4 border-0 bg-gray-700">
                                        <span class="absolute px-3 font-medium -translate-x-1/2  left-1/2 bg-gray-900">Delivery Info</span>
                                    </div>
                                    <div class="space-y-6">
                                        <div>
                                            <label for="customer_name" class="block mb-2 text-sm font-medium">Name</label>
                                            <input type="text" name="customer_name" id="customer_name" class="text-gray-900 text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400" placeholder="King Cytro" required>
                                        </div>
                                        <div>
                                            <label for="customer_email" class="block mb-2 text-sm font-medium">Email</label>
                                            <input type="email" name="customer_email" id="customer_email" class="text-gray-900 text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400" placeholder="customer@email.com" required>
                                        </div>
                                        <div>
                                            <label for="customer_phone" class="block mb-2 text-sm font-medium">Phone Number</label>
                                            <input type="number" id="customer_phone" name="customer_phone" class="text-gray-900 text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" placeholder="08012345678" required>
                                        </div>
                                        <div>
                                            <label for="customer_address" class="block mb-2 text-sm font-medium">Delivery Address</label>
                                            <textarea id="customer_address" name="customer_address" class="text-gray-900 text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" placeholder="123 test avenue maryland lagos" required></textarea>
                                        </div>
                                        <input type="hidden" name="items" value='<?php echo json_encode($items) ?>' />
                                        <input type="hidden" name="total" value="<?php echo $total ?>" />
                                        <button type="submit" name="checkout" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Check Out</button>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p class="flex justify-center items-center p-4">Nothing in cart</p>
                            <?php endif ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <?php include('partials/footer.php') ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>