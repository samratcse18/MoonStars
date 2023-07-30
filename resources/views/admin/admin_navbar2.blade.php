<div class="flex justify-center">
    <div class="bg-gray-800 w-full lg:w-[80%] mt-[70px]">
        <div class="flex items-center justify-between h-10 px-4">
                    <div class="relative group">
                        <button id="dropdownButton2" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:bg-gray-700 focus:text-white" aria-haspopup="true">
                            {{Auth::guard('admin')->user()->username}}
                            <i class="fas fa-chevron-down ml-1"></i>
                        </button>
                        <div id="dropdownMenu2" class="absolute z-10 hidden bg-gray-800 text-white py-2 px-4 mt-2 w-[200px] rounded-md shadow-lg" aria-label="submenu">
                            <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm border-b border-black">Profile</a>
                            <a href="{{ route('admin.bank_account') }}" class="block px-4 py-2 text-sm border-b border-black">Add Bank Account</a>
                            <a href="{{ route('admin.bank_account_list') }}" class="block px-4 py-2 text-sm border-b border-black">Bank Account List</a>
                            <a href="{{ route('admin.password_change') }}" class="block px-4 py-2 text-sm border-b border-black">Change Password</a>
                            <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm border-b border-black">Logout</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <h1 class="text-white font-semibold text-lg">Admin Profile</h1>
                    </div>
                    <div class="flex items-center">
                        <a class="text-white font-semibold text-lg" href="#">Logo</a>
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