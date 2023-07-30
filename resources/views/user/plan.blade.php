<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Plan</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<section id="mainContent" class="">
    <div class="flex justify-center">
        <div class="my-8 flex flex-col lg:flex-row justify-center lg:space-x-2 space-y-2 lg:space-y-0 lg:w-[80%] w-[95%]">
            <div class="lg:w-[50%] w-[100%] py-8 flex flex-col justify-center items-center space-y-4">
                <h1 class="text-5xl text-yellow-500 mb-4">My Plan</h1>
                <div class="flex lg:flex-row flex-col justify-between lg:space-x-4 space-y-4 lg:space-y-0">
                    <?php
                    if(session('total_balance')>=1000 && session('total_balance')<=5000){
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Balance</h1>
                            <h1 class="text-5xl text-black">1000 to 5000<span class="text-white text-5xl mr-1">&#x09F3;</span></h1>
                            <p class="text-2xl">Daily Profit 3.5%</p>
                        </div>';
                    }
                    else if(session('total_balance')>=5001 && session('total_balance')<=10000){
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Balance</h1>
                            <h1 class="text-5xl text-black">5001 to 10000<span class="text-white text-5xl mr-1">&#x09F3;</span></h1>
                            <p class="text-2xl">Daily Profit 4%</p>
                        </div>';
                    }
                    else if(session('total_balance')>=10001 && session('total_balance')<=20000){
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Balance</h1>
                            <h1 class="text-5xl text-black">10001 to 20000<span class="text-white text-5xl mr-1">&#x09F3;</span></h1>
                            <p class="text-2xl">Daily Profit 4.5%</p>
                        </div>';
                    }
                    else if(session('total_balance')>=20001 && session('total_balance')<=100000){
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Balance</h1>
                            <h1 class="text-5xl text-black">20001 to 100000<span class="text-white text-5xl mr-1">&#x09F3;</span></h1>
                            <p class="text-2xl">Daily Profit 5%</p>
                        </div>';
                    }
                    else if(session('total_balance')>=100001){
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Balance</h1>
                            <h1 class="text-5xl text-black">100001 to infinite<span class="text-white text-5xl mr-1">&#x09F3;</span></h1>
                            <p class="text-2xl">Daily Profit 5.5%</p>
                        </div>';
                    }
                    else{
                        echo '<div class="flex flex-col justify-center items-center lg:w-[500px] w-[350px] lg:h-[200px] h-[170px] text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm ">
                            <h1 class="text-2xl">Dose Not Active Plan</h1>
                        </div>';
                    }
                    ?>
                </div>
        </div>
    </div>
    
 </section>
</body>
</html>