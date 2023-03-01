<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Receipt</title>
</head>

<body>
    <?php include("../config/constants.php") ?>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $res = $conn->query("SELECT * FROM `order` WHERE `id` = $id");

        $order = $res->fetch_assoc();

        if (!$order['id']) {
            $_SESSION['no-order-found'] = '<span class="text-sm font-semibold text-red-500">Order not Found.</span>';
            header('location:' . SITEURL . 'admin/manage-orders.php');
        }

        $customer_name = $order['customer_name'];
        $customer_email = $order['customer_email'];
        $customer_phone = $order['customer_phone'];
        $customer_address = $order['customer_address'];
        $total = $order['total'];
        $items = $order['items'];
    } else {
        header('location:' . SITEURL . 'admin/manage-orders.php');
    }
    ?>

    <!-- Hacky way to pass data from php to js --->
    <input type="hidden" id="customer_name" value="<?php echo $customer_name ?>" />
    <input type="hidden" id="customer_email" value="<?php echo $customer_email ?>" />
    <input type="hidden" id="customer_address" value="<?php echo $customer_address ?>" />
    <input type="hidden" id="customer_phone" value="<?php echo $customer_phone ?>" />
    <input type="hidden" id="items" value='<?php echo $items ?>' />
    <input type="hidden" id="total" value='<?php echo $total ?>' />
    <script src="
    https://cdn.jsdelivr.net/npm/receiptline@1.15.0/lib/receiptline.min.js
    "></script>

    <!-- Element to style svg from js -->
    <div id="container" class="min-h-screen flex justify-center p-4 font-montserrat"></div>

    <script>
        // Collecting Date from php & html
        const container = document.querySelector("#container");
        const customer_name = document.querySelector("#customer_name").value
        const customer_email = document.querySelector("#customer_email").value
        const customer_phone = document.querySelector("#customer_phone").value
        const customer_address = document.querySelector("#customer_address").value
        const items = JSON.parse(document.querySelector("#items").value)
        const total = document.querySelector("#total").value

        // Generating receipt
        const doc = `
^^^"FOODIE
-
{w:*,25}
Customer Name: | ${customer_name}
{w:*,25}
Customer Email: | ${customer_email}
{w:*,25}
Customer Phone: | ${customer_phone}
{w:*,22}
Customer Address: | ${customer_address}
{w:*,4,8}
-
|"ITEM | "QTY| "PRICE
-
${items.map((item, i) => `${item['title']} | ${item['quantity']}| ${Number(item['price']) * Number(item['quantity'])}` + `${(i != items.length - 1) ? '\n' : ''}`).join("")}
-
{w:*,25}
^^TOTAL | ^^^₦${total}

{c:2012345678903;option:ean,hri}

{w:*}
thanks for shopping at Foodie
`

        // Setting Display properties for receipt
        const display = {
            cpl: 41,
            encoding: "multilingual",
            spacing: true,
        };

        // Generating svg
        const svg = receiptline.transform(doc, display);

        // Adding svg to container
        container.innerHTML = svg;
    </script>
</body>

</html>