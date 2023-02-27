<?php require_once("../config/constants.php") ?>
<!--TODO: remember to enable auth -->
<?php #include('login-check.php')
?>
<nav class=" border-gray-200 px-2 sm:px-4 py-2.5  bg-gray-900 font-montserrat">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="<?php echo SITEURL . '/admin'  ?>" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Foodie</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm  rounded-lg md:hidden  focus:outline-none focus:ring-2  text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 border space-y-2 md:space-y-0  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                <li>
                    <a href="index.php" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (str_contains($_SERVER['PHP_SELF'], 'index.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Home</a>
                </li>
                <li>
                    <a href="manage-admins.php" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (str_contains($_SERVER['PHP_SELF'], 'manage-admins.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Admins</a>
                </li>
                <li>
                    <a href="manage-categories.php" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (str_contains($_SERVER['PHP_SELF'], 'manage-categories.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Categories</a>
                </li>
                <li>
                    <a href="manage-foods.php" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (str_contains($_SERVER['PHP_SELF'], 'manage-foods.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Foods</a>
                </li>
                <li>
                    <a href="manage-orders.php" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (str_contains($_SERVER['PHP_SELF'], 'manage-orders.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Orders</a>
                </li>
                <div class="w-full flex md:hidden justify-end">
                    <a title="Logout" href="<?php echo SITEURL . '/admin/logout.php'  ?>" class="text-white p-2 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600">
                        <svg class=" w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                    </a>
                </div>
            </ul>
        </div>
        <a title="Logout" href="<?php echo SITEURL . '/admin/logout.php'  ?>" class=" text-white hidden md:flex p-2 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600">
            <svg class=" w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
        </a>
    </div>
</nav>