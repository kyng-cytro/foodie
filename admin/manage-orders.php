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
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Manage Orders</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>
    <?php
    $orders = $conn->query("SELECT * FROM `order` ORDER BY `id` DESC")
    ?>
    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-4">
            <h2 class="font-bold text-2xl uppercase">Manage Orders</h2>
            <div>
                <?php
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
                <?php
                if (isset($_SESSION['no-order-found'])) {
                    echo $_SESSION['no-order-found'];
                    unset($_SESSION['no-order-found']);
                }
                ?>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs  uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                S/N
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No Items
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($orders->fetch_array()) : ?>
                            <?php foreach ($orders as $key => $order) : ?>
                                <tr class=" border-b bg-gray-900 border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                        <?php echo $key + 1 ?>
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo $order['customer_name'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo $order['customer_email'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo $order['customer_phone'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $order['customer_address'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo count(json_decode($order['items'])) . ' Item(s)' ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo date_format(date_create($order['order_date']), "d M, Y") ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        <span class="capitalize whitespace-nowrap"><?php echo $order['status'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo "₦" . $order['total'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" flex flex-col md:flex-row gap-4 items-center justify-start">
                                            <a target="_blank" href="<?php echo SITEURL . 'admin/print-order.php?id=' . $order['id'] ?>" class="font-medium text-green-600 dark:text-green-500 hover:underline">Print</a>
                                            <a href="<?php echo SITEURL . 'admin/edit-order.php?id=' . $order['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td class=" text-xl text-center p-4" colspan="8">Nothing to show</td>
                            </tr>
                        <?php endif ?>
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