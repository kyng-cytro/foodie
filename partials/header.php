<?php require_once("config/constants.php") ?>
<!-- Navbar -->
<nav class="border-gray-200 px-2 sm:px-4 py-2.5 rounded bg-gray-900 font-montserrat">
  <div class="md:max-w-[80%] container flex flex-wrap items-center justify-between mx-auto">
    <a href="#" class="flex items-center">
      <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Foodie</span>
    </a>
    <div class="flex md:order-2">
      <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Search</span>
      </button>
      <div class="relative hidden md:block">
        <form method="GET" action="<?php echo SITEURL . 'search.php' ?>">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Search icon</span>
          </div>
          <input name="query" type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm border rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search foods..." />
        </form>
      </div>
      <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
        <span class="sr-only">Open menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>

      <!-- Cart Button-->
      <a href="<?php echo SITEURL . 'cart.php' ?>" class=" text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1 md:ml-4 relative">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
        </svg>
        <span class="sr-only">Cart</span>
        <!-- TODO: make item count dynamic -->
        <span class="absolute text-[10px]  font-semibold top-[1.3rem] right-[0.1rem]"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0  ?></span>
      </a>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
      <div class="relative mt-3 md:hidden">
        <form method="GET" action="<?php echo SITEURL . 'search.php' ?>">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input name="query" type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." />
        </form>
      </div>
      <ul class="flex flex-col p-4 mt-4 space-y-2 md:space-y-0 border rounded-lg md:flex-row md:space-x-10 lg:space-x-14 md:mt-0 md:text-sm md:font-medium md:border-0 bg-gray-900 md:bg-gray-900 border-gray-700">
        <li>
          <a href="<?php echo SITEURL ?>" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (strpos($_SERVER['PHP_SELF'], 'index.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Home</a>
        </li>
        <li>
          <a href="<?php echo SITEURL . 'menu.php' ?>" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (strpos($_SERVER['PHP_SELF'], 'menu.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Menu</a>
        </li>
        <li>
          <a href="<?php echo SITEURL . 'contact.php' ?>" class="<?php echo ('block mb-1 md:mb-0 py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 ') . (strpos($_SERVER['PHP_SELF'], 'contact.php') ? ('text-white bg-blue-700 md:text-blue-700') : ('text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent ')) ?>">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>