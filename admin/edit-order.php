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
    <title>Foodie | Edit Order</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `order` WHERE `id`= $id";

        $res = $conn->query($sql);

        $order = $res->fetch_assoc();

        if (!$order['id']) {
            $_SESSION['no-order-found'] = '<span class="text-sm font-semibold text-red-500">Order not Found.</span>';
            header('location:' . SITEURL . 'admin/manage-categories.php');
        }

        $customer_name = $order['customer_name'];
        $customer_email = $order['customer_email'];
        $customer_phone = $order['customer_phone'];
        $customer_address = $order['customer_address'];
        $status = $order['status'];
    } else {
        header('location:' . SITEURL . 'admin/manage-orders.php');
    }
    ?>
    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-6">
            <h2 class="font-bold text-2xl uppercase">Edit Order</h2>

            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $customer_name = $_POST['customer_name'];
                $customer_email = $_POST['customer_email'];
                $customer_phone = $_POST['customer_phone'];
                $customer_address = $_POST['customer_address'];
                $status = $_POST['status'];

                $sql = "UPDATE `order` SET
                    `customer_name` = '$customer_name',
                    `customer_email` = '$customer_email',
                    `customer_phone` = '$customer_phone',
                    `customer_address` = '$customer_address',
                    `status` = '$status',
                    `updated_at` = now()
                    WHERE `id`= $id
                ";

                $res = $conn->real_query($sql);

                if ($res) {
                    $_SESSION['update'] = '<span class="text-sm font-semibold text-green-500">Order Updated Successfully</span>';
                } else {
                    $_SESSION['update'] = '<span class="text-sm font-semibold text-red-500">An Error Occurred While Updating Order</span';
                }

                header('location:' . SITEURL . 'admin/manage-orders.php');
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="max-w-3xl">
                <div class="mb-6">
                    <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 ">Customer Name</label>
                    <input name="customer_name" value="<?php echo $customer_name; ?>" type="text" id="customer_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="customer_email" class="block mb-2 text-sm font-medium text-gray-900 ">Customer Email</label>
                    <input name="customer_email" value="<?php echo $customer_email; ?>" type="text" id="customer_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 ">Customer Phone</label>
                    <input name="customer_phone" value="<?php echo $customer_phone; ?>" type="text" id="customer_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="customer_address" class="block mb-2 text-sm font-medium text-gray-900">Customer Address</label>
                    <textarea name="customer_address" value="<?php echo $customer_address; ?>" type="text" id="customer_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required><?php echo $customer_address; ?></textarea>
                </div>
                <div class="mb-6">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <?php echo $status ?>
                        <option <?php echo ($status == "pending") ? "selected" : null ?> value="pending">Pending</option>
                        <option <?php echo ($status == "confirmed") ? "selected" : null ?> value="confirmed">Confirmed</option>
                        <option <?php echo ($status == "out_for_delivery") ? "selected" : null ?> value="out_for_delivery">Out for delivery</option>
                        <option <?php echo ($status == "delivered") ? "selected" : null ?> value="delivered">Delivered</option>
                        <option <?php echo ($status == "cancelled") ? "selected" : null ?> value="cancelled">Cancelled</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Order</button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>