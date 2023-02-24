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
    <title>Foodie | Admin</title>
</head>

<body class="min-h-screen flex flex-col">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-4">
            <h2 class="font-bold text-2xl uppercase">Dashboard</h2>

            <div class="grid gap-3 grid-cols-2 md:grid-cols-4">
                <div class=" bg-slate-300 py-8 px-8 text-center rounded-md">
                    <h3 class=" font-semibold text-xl">5</h3>
                    <p class=" text-sm text-slate-700">Categories</p>
                </div>
                <div class=" bg-slate-300 py-8 px-8 text-center rounded-md">
                    <h3 class=" font-semibold text-xl">5</h3>
                    <p class=" text-sm text-slate-700">Categories</p>
                </div>
                <div class=" bg-slate-300 py-8 px-8 text-center rounded-md">
                    <h3 class=" font-semibold text-xl">5</h3>
                    <p class=" text-sm text-slate-700">Categories</p>
                </div>
                <div class=" bg-slate-300 py-8 px-8 text-center rounded-md">
                    <h3 class=" font-semibold text-xl">5</h3>
                    <p class=" text-sm text-slate-700">Categories</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>