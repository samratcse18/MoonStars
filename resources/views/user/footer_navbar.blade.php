<nav class="block lg:hidden bg-[#51236e] text-white fixed bottom-0 w-full">
    <div class="flex justify-between items-center">
        <a href="/"><div class="flex flex-col justify-center items-center hover:bg-gray-600 p-2">
            <i class="fa fa-home" style="font-size: 24px; color: #007bff;"></i>
            <h1 class="hover:text-gray-300">Home</h1>
        </div></a>
        <a href="{{ route('user.task') }}"><div class="flex flex-col justify-center items-center hover:bg-gray-600 p-2">
            <i class="fa fa-tasks" style="font-size: 24px; color: #ff9900;"></i>
            <h1 class="hover:text-gray-300">Today Task</h1>
        </div></a>
        <a href="{{ route('user.plan') }}"><div class="flex flex-col justify-center items-center hover:bg-gray-600 p-2">
            <i class="fa fa-calendar-alt" style="font-size: 24px; color: #33cc33;"></i>
            <h1 class="hover:text-gray-300">My Plan</h1>
        </div></a>
        <a href="{{ route('user.finance') }}"><div class="flex flex-col justify-center items-center hover:bg-gray-600 p-2">
            <i class="fa fa-wallet" style="font-size: 24px; color: #ffcc00;"></i>
            <h1 class="hover:text-gray-300">My Wallet</h1>
        </div></a>
    </div>
</nav>