<?php
if (isset($_GET['refer_code'])) {
    $refer_code = $_GET['refer_code'];
}
if (isset($refer_code)) {
    $refer_code = htmlspecialchars($refer_code);
}
else{
    $refer_code = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>MoonStars24</title>
</head>
<body class="bg-[#100429] text-white">
 @include('partial/navbar')
 @include('partial/footer_navbar')
 @include('partial/error_success')
 <div class="mt-[58px]"></div>
 <section id="mainContent" class="">
    <div class="flex justify-center">
        <div class="my-8 flex flex-col lg:flex-row justify-center lg:space-x-2 space-y-2 lg:space-y-0 lg:w-[80%] w-[95%]">
            <div class="lg:w-[50%] w-[100%] lg:py-8 py-0 flex flex-col justify-center items-center space-y-4">
                <h1 class="text-4xl text-[#00cc66]">All Plan</h1>
                <div class="flex lg:flex-row flex-col justify-between lg:space-x-4 space-y-4 lg:space-y-0">
                    <div class="flex flex-col justify-center items-center w-[250px] h-[100px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                        <h1 class="">Balance</h1>
                        <h1 class="text-2xl text-black">1000 to 5000<span class="text-white text-2xl mr-1">&#x09F3;</span></h1>
                        <p>Daily Profit 3.5%</p>
                    </div>
                    <div class="flex flex-col justify-center items-center w-[250px] h-[100px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                        <h1 class="">Balance</h1>
                        <h1 class="text-2xl text-black">5001 to 10000<span class="text-white text-2xl mr-1">&#x09F3;</span></h1>
                        <p>Daily Profit 4%</p>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col justify-between lg:space-x-4 space-y-4 lg:space-y-0">
                    <div class="flex flex-col justify-center items-center w-[250px] h-[100px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                        <h1 class="">Balance</h1>
                        <h1 class="text-2xl text-black">10001 to 20000<span class="text-white text-2xl mr-1">&#x09F3;</span></h1>
                        <p>Daily Profit 4.5%</p>
                    </div>
                    <div class="flex flex-col justify-center items-center w-[250px] h-[100px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                        <h1 class="">Balance</h1>
                        <h1 class="text-2xl text-black">20001 to 100000<span class="text-white text-2xl mr-1">&#x09F3;</span></h1>
                        <p>Daily Profit 5%</p>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col justify-between lg:space-x-4 space-y-4 lg:space-y-0">
                    <div class="flex flex-col justify-center items-center w-[250px] h-[100px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                        <h1 class="">Balance</h1>
                        <h1 class="text-2xl text-black">100001 to infinite<span class="text-white text-2xl mr-1">&#x09F3;</span></h1>
                        <p>Daily Profit 5.5%</p>
                    </div>
                </div>
            </div>
            <div class=" flex flex-col justify-center items-center lg:w-[50%] w-[100%]">
                <h1 class="text-4xl text-[#00cc66]">Notice</h1><br>
                <div class="text-[18px] px-4">
                    <p>1. After Deposit we will accept your Deposit request within 30 minute.</p>
                    <p>2. We will pay you every night between 8pm and 9pm.</p>
                    <p>3. Withdraw and Deposit Method Bkash & Nagad.</p>
                    <p>4. Per Referral get 0.5 % Bonus every Day.When your refer user Deposit Amount then you get Referral Bonus.</p>
                </div>
            </div>
        </div>
    </div>
    
 </section>
 <section>
    <div class="flex flex-col items-center">
        <div id="loginModal" class="hidden w-full px-6 my-16 mx-auto sm:max-w-lg">
            <div class="p-6 space-y-4 md:space-y-6  bg-[#51236e] rounded-lg sm:p-8">
                <div class="flex justify-end">
                    <div id="logincloseButton" class="bg-white cursor-pointer">
                        <i class="fa fa-times mx-1" style="font-size: 24px; color: #cc0000;"></i>
                    </div>
                </div>
                <h1
                    class="text-xl font-bold leading-tight tracking-tight  md:text-2xl dark:text-white">
                    Sign in
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('user.doLogin') }}" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  dark:text-white">Your
                            Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@gmail.com">
                        @error('email')
                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password')
                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit"
                        class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>
 </section>
 <section>
    <div class="flex flex-col items-center  ">
        <div id="signupModal"
            class="hidden w-full h-full px-6 my-16 mx-auto sm:max-w-lg">
            <div class="p-6 space-y-4 md:space-y-6 bg-[#51236e] rounded-lg sm:p-8">
                <div class="flex justify-end">
                    <div id="signupcloseButton" class="bg-white cursor-pointer">
                        <i class="fa fa-times mx-1" style="font-size: 24px; color: #cc0000;"></i>
                    </div>
                </div>
                <h1
                    class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
                    Sign Up
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('user.create') }}" method="post">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium dark:text-white">Name<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Name" >
                        @error('name')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium dark:text-white">Username<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Username" >
                        @error('username')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium dark:text-white">Email Id<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@gmail.com" >
                        @error('email')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium dark:text-white">Phone Number<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="number" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Phone Number" >
                        @error('phone')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="promocode" class="block mb-2 text-sm font-medium dark:text-white">Promocode (Optional)</label>
                        <input type="text" name="promocode" id="promocode" value="<?php echo $refer_code; ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Promocode">
                        @error('promocode')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium dark:text-white">Password<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        @error('password')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="cpassword"
                            class="block mb-2 text-sm font-medium dark:text-white">Confirm Password<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        @error('cpassword')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit"
                        class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                        up</button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('partial/footer')
 <script src="https://cdn.tailwindcss.com/2.2.19/tailwind.min.js"></script>
    <script>
        document.getElementById("loginButton").addEventListener("click", function() {
            document.getElementById("loginModal").classList.remove("hidden");
            document.getElementById("mainContent").classList.add("hidden");
        });

        document.getElementById("logincloseButton").addEventListener("click", function() {
            document.getElementById("loginModal").classList.add("hidden");
            document.getElementById("mainContent").classList.remove("hidden");
        });
        document.getElementById("signupButton").addEventListener("click", function() {
            document.getElementById("signupModal").classList.remove("hidden");
            document.getElementById("mainContent").classList.add("hidden");
        });

        document.getElementById("signupcloseButton").addEventListener("click", function() {
            document.getElementById("signupModal").classList.add("hidden");
            document.getElementById("mainContent").classList.remove("hidden");
        });
        const loginButton = document.getElementById('loginButton');
        const loginModal = document.getElementById('loginModal');
        const signupButton = document.getElementById('signupButton');
        const signupModal = document.getElementById('signupModal');
        const mainContent = document.getElementById('mainContent');
        window.addEventListener("click", function(event) {
            if (!loginButton.contains(event.target) && !loginModal.contains(event.target)) {
                loginModal.classList.add("hidden");
            }
        });
        window.addEventListener("click", function(event) {
            if (!signupButton.contains(event.target) && !signupModal.contains(event.target)) {
                signupModal.classList.add("hidden");
            }
        });
    </script>
</body>
</html>