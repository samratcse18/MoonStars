<nav class="fixed top-0 w-full z-10 bg-[#51236e] border-gray-200 px-2 sm:px-4 py-1">
  <div class="flex justify-between items-center space-x-2 lg:px-[10%]">
    <div class="flex space-x-2">
      <a href="/"><img class="h-[50px] w-[50px]" src="{{ asset('image/logo.png') }}" alt=""></a>
      <a href="/"><p class="text-yellow-400">Moon <br>Stars</p></a>
    </div>
    <a href="{{ route('user.logout') }}"><div class="flex justify-center items-center space-x-1 px-2 hover:bg-gray-600">
          <i class="fa fa-sign-out-alt" style="font-size: 24px; color: #cc0000;"></i>
          <h1 class="block py-2 text-white">Logout</h1>
    </div></a>
  </div>
</nav>
@include('user/user_navbar2')
<div class="lg:mt-[58px] mt-3"></div>
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