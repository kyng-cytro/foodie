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
        <div class="flex-1 lg:py-5 text-gray-400">
            <div class="md:max-w-lg mx-auto p-4">
                <h5 class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>Contact us</h5>
                <form action="#" class="mb-6">
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                        <input type="email" id="email" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username@domain.com" required>
                    </div>
                    <div class="mb-6">
                        <label for="subject" class="block mb-2 text-sm font-medium text-white">Subject</label>
                        <input type="text" id="subject" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Let us know how we can help you" required>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-white">Your message</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm   rounded-lg border  focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2  focus:outline-none  block">Send message</button>
                </form>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <a href="#" class="hover:underline">info@foodie.com</a>
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <a href="#" class="hover:underline">123-456-7890</a>
                </p>
            </div>
        </div>
        <?php include('partials/footer.php') ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>