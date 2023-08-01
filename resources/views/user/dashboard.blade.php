<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Dashboard</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<section id="mainContent" class="lg:ml-[250px] ml-0 mb-[100px] lg:mb-0">
    <div class="flex justify-center items-center lg:pt-8 pt-2 px-2 lg:px-0">
        <h1 class="text-xl lg:text-2xl text-red-400">💖💖 Your each Refer user when Deposit you can get Extra 50 Taka 💖💖</h1>
    </div>
    <div class="flex justify-center">
        <div class="lg:my-8 my-0 flex flex-col lg:flex-row justify-center lg:space-x-2 space-y-2 lg:space-y-0 lg:w-[80%] w-[95%]">
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
                <div class="text-[18px] text-white px-4">
                    <p>1. After Deposit we will accept your Deposit request within 30 minute.</p>
                    <p>2. We will pay you every night between 8pm and 9pm.</p>
                    <p>3. Withdraw and Deposit Method Bkash & Nagad.</p>
                    <p>4. Per Referral get 0.5 % Bonus every Day.When your refer user Deposit Amount then you get Referral Bonus.</p>
                </div>
            </div>
        </div>
    </div>
    
 </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
                $.ajax({
                    url: "{{ route('user.dashboard') }}",
                    method: 'POST'
                });
        });
    </script>
</body>
</html>