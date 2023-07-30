<div class="hidden lg:block w-[250px] bg-[#51236e] h-full fixed">
    <div class="p-[20px]">
      <!-- Sidebar content goes here -->
      <div  class="bg-gray-800  text-white py-2 px-4 mt-2 w-[200px] rounded-md " aria-label="submenu">
        <div class="flex justify-center">
            <img src="{{ asset('image/man.png') }}" width="100" height="100" alt="">
        </div>
        <h1 class="block px-4 py-2 text-sm border-b border-black">My Balence <span class="pl-4 font-bold text-yellow-400"><span class="text-xl mr-1">&#x09F3;</span>{{ session('total_balance') }}</span></h1>
        <a href="/"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
            <i class="fa fa-home" style="font-size: 24px; color: #007bff;"></i>
            <h1 class="block text-sm">Home</h1>
        </div></a>
        <a href="{{ route('user.profile') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
            <i class="fa fa-user" style="font-size: 24px; color: #ff6600;"></i>
            <h1 class="block text-sm">Profile</h1>
        </div></a>
        <a href="{{ route('user.task') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
            <i class="fa fa-tasks" style="font-size: 24px; color: #ff9900;"></i>
            <h1 class="block text-sm">Today Task</h1>
        </div></a>
        <a href="{{ route('user.plan') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
            <i class="fa fa-calendar-alt" style="font-size: 24px; color: #33cc33;"></i>
            <h1 class="block text-sm">My Plan</h1>
        </div></a>
        <a href="{{ route('user.finance') }}"><div class="flex items-center space-x-1 hover:bg-gray-600 border-b border-black px-4 py-2">
            <i class="fa fa-wallet" style="font-size: 24px; color: #ffcc00;"></i>
            <h1 class="block text-sm">My Wallet</h1>
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
  </div>