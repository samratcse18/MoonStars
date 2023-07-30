<div class="block lg:hidden">
    <div class="flex justify-center">
    <div class="bg-gray-800 w-full lg:w-[80%] mt-[70px]">
        <div class="flex items-center justify-between h-10 px-4">
                    <div class="relative group">
                        <button id="dropdownButton2" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:bg-gray-700 focus:text-white" aria-haspopup="true">
                            All Details
                            <i class="fas fa-chevron-down ml-1"></i>
                        </button>
                        <div id="dropdownMenu2" class="absolute z-10 hidden bg-gray-800 text-white py-2 px-4 mt-2 w-[200px] rounded-md shadow-lg" aria-label="submenu">
                            <h1 class="block px-4 py-2 text-sm border-b border-black">My Balence <span class="pl-4 font-bold text-yellow-400"><span class="text-xl mr-1">&#x09F3;</span>{{ session('total_balance') }}</span></h1>
                            <a href="{{ route('user.profile') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-user" style="font-size: 24px; color: #ff6600;"></i>
                                <h1 class="block text-sm">Profile</h1>
                            </div></a>
                            <a href="{{ route('user.password_change') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-lock" style="font-size: 24px; color: #3366cc;"></i>
                                <h1 class="block text-sm">Change Password</h1>
                            </div></a>
                            <a href="{{ route('user.refer') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-share" style="font-size: 24px; color: #ff9900;"></i>
                                <h1 class="block text-sm">Refer</h1>
                            </div></a>
                            <a href="{{ route('user.refer_user') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-user" style="font-size: 24px; color: #008080;"></i>
                                <h1 class="block text-sm">Refer User</h1>
                            </div></a>
                            <a href="{{ route('user.statement') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-history" style="font-size: 24px; color: #993399;"></i>
                                <h1 class="block text-sm">History</h1>
                            </div></a>
                            <a href="{{ route('user.support') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-headset" style="font-size: 24px; color: #007bff;"></i>
                                <h1 class="block text-sm">Support</h1>
                            </div></a>
                            <a href="{{ route('user.logout') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
                                <i class="fa fa-sign-out-alt" style="font-size: 24px; color: #cc0000;"></i>
                                <h1 class="block text-sm">Logout</h1>
                            </div></a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <h1 class="text-white font-semibold ">Balance: <span class="font-bold text-yellow-400"><span class="text-xl mr-1">&#x09F3;</span>{{ session('total_balance') }}</span></h1>
                    </div>
        </div>
    </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script>
    // JavaScript code to handle the dropdown functionality
    const dropdownButton2 = document.getElementById("dropdownButton2");
    const dropdownMenu2 = document.getElementById("dropdownMenu2");

    dropdownButton2.addEventListener("click", function() {
        dropdownMenu2.classList.toggle("hidden");
    });

    // Close the dropdown menu when clicking outside of it
    window.addEventListener("click", function(event) {
        if (!dropdownButton2.contains(event.target)) {
            dropdownMenu2.classList.add("hidden");
        }
    });
</script>
</div>



