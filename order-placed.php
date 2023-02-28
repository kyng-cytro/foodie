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
    <title>Foodie | Home</title>
</head>

<body class="bg-slate-800 font-montserrat">
    <?php include('config/constants.php'); ?>
    <div class="min-h-screen flex flex-col justify-center items-center ">
        <div class="lg:py-5 text-gray-400">
            <div class="flex flex-col justify-center items-center gap-4 w-full p-4">
                <img class="h-auto w-28 md:w-36" src="images/icons/check.png" />
                <h3 class=" text-lg font-bold">Ordered Placed</h3>
                <a href="<?php echo SITEURL ?>" class="text-center py-2.5 px-5 text-sm font-medium  focus:outline-none  rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">BACK HOME</a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>