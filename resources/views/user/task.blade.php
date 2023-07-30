<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Task</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0">
    <div class="flex justify-center text-white mb-[60px]">
        <div class="lg:w-[100%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[60%] w-full bg-[#51236e] rounded-lg">
                <h1 class="w-full  border-b border-black p-2 text-2xl">Today Task</h1>
                <h1 class="p-2 text-xl text-red-400">Note:</h1>
                <p class="p-2">1. Every day one time claim it. Without claim you can not get daily Reward</p>
                <p class="p-2">2. If Balance is less than 1000 Taka then the Claim Button automatically disabled</p>
                <div class="flex justify-center my-4">
                    <a href='user_task/claim/{{Auth::guard('user')->user()->id}}'>
                        <button id="claim" class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Claim Now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const date1 = '{{ $date }}';
    const date2 = "{{ now()->format('d-m-Y') }}";
    const balance = "{{ session('total_balance') }}"
    if(date1 === date2){
            claim.setAttribute('disabled', true);
            claim.innerText = "Claimed";
            claim.style.backgroundColor = 'gray';
    }
    else if(balance < 1000){
            claim.setAttribute('disabled', true);
            claim.innerText = "Claim Button Disabled";
            claim.style.backgroundColor = 'gray';
    }
</script>
</body>
</html>