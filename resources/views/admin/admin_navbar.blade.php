<nav class="fixed top-0 w-full z-10 bg-[#51236e] border-gray-200 px-2 sm:px-4 py-1">
  <div class="flex justify-between lg:items-center space-x-2 lg:px-[10%]">
    <a href="/"><div class="">
      <img class="h-[50px] lg:h-[50px] w-[70px] lg:w-[70px]" src="{{ asset('image/logo.png') }}" alt="">
    </div></a>
    <a href="/"><p class="text-yellow-400">Moon Stars</p></a>
    <div class="container flex flex-wrap items-center justify-end mx-auto">
      <div class="flex md:order-2">
        <button data-collapse-toggle="navbar-search" type="button" id="dropdownButton" class="inline-flex items-center p-2 text-sm text-white hover:text-black rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
        <div id="dropdownMenu"  class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
          <ul class="flex flex-col p-4 mt-4  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium   dark:border-gray-700">
            <li>
              <a href="/" class="block py-2 pl-3 pr-4 text-blue-600   md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
              <a href="{{ route('admin.statement') }}" class="block py-2 pl-3 pr-4 text-white hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Statement</a>
            </li>
            <li>
              <a href="{{ route('admin.user_list') }}" class="block py-2 pl-3 pr-4 text-white hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">User List</a>
            </li>
            <li>
              <a href="{{ route('admin.logout') }}" class="block py-2 pl-3 pr-4 text-white hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</a>
            </li>
          </ul>
        </div>
    </div>
  </div>
</nav>
@include('admin/admin_navbar2')
<div class="mt-[62px]"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        // JavaScript code to handle the dropdown functionality
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        dropdownButton.addEventListener("click", function() {
            dropdownMenu.classList.toggle("hidden");
        });

        // Close the dropdown menu when clicking outside of it
        window.addEventListener("click", function(event) {
            if (!dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    </script>