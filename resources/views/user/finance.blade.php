<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Finance</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0 lg:pb-0 pb-[60px]">
    <div class="flex justify-center text-white mb-[60px]">
        <div class="lg:w-[95%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[60%] w-full bg-[#51236e] rounded-lg">
                <div>
                    <h1 class="w-full  border-b border-black p-2 text-2xl"><i class="fa fa-wallet mr-2" style="font-size: 24px; color: #ffcc00;"></i>My Wallet</h1>
                    <div class=" text-white m-4">
                        <button id="depositButton" class="border-2 border-solid border-[#ff4648] p-2 m-2  font-bold bg-[#ff4742] rounded-sm w-[120px]">Deposit</button>
                        <button id="withdrawButton" class="border-2 border-solid border-[#ff4648] p-2 m-2 bg-[#2a2a2a] font-bold hover:bg-[#ff4742] rounded-sm w-[120px]">Withdraw</button>
                    </div>
                </div>
                <div id="depositMenu" class="">
                    <h1 class="ml-8 mt-4 font-bold text-2xl">Request A Deposit</h1>
                    <h1 class="ml-8 mt-4"><span class="text-lg text-[#dc3545]">**</span>Minimum Deposit Request 1000 Taka</h1>
                    <h1 class="ml-8"><span class="text-lg text-[#dc3545]">**</span>After Deposit we will accept your Deposit request within 30 minute</h1>
                    <form class="" action="{{ route('user.deposit') }}" method="post">
                    @csrf
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="method" class="block mb-2 text-sm font-medium  dark:text-white">Method<span class="text-lg text-[#dc3545]">*</span></label>
                            <select name="method" id="paymentMethod" onchange="fetchOptions()" class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Method</option>
                                <option value="bkash">Bkash Send Money</option>
                                <option value="nogod">Nagad Send Money</option>
                            </select>
                            @error('method')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="lg:w-[45%] w-full">
                            <label for="receive_payment_number" class="block mb-2 text-sm font-medium dark:text-white">To<span class="text-lg text-[#dc3545]">*</span></label>
                            <select name="receive_payment_number" id="paymentNumber" class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Number</option>
                                    @foreach ($accounts as $account)
                                    <option value=`{{$account->account}}`>{{$account->account}} ({{$account->method}})</option>
                                    @endforeach
                            </select>
                            @error('receive_payment_number')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="amount" class="block mb-2 text-sm font-medium dark:text-white">Amount<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('amount')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                        <div class="lg:w-[45%] w-full">
                            <label for="user_payment_number" class="block mb-2 text-sm font-medium dark:text-white">Your Bkash or Nagad Number<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="text" name="user_payment_number" id="user_payment_number" placeholder="Enter Your Number"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('user_payment_number')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="transaction_no" class="block mb-2 text-sm font-medium dark:text-white">Transaction No<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="text" name="transaction_no" id="transaction_no" placeholder="Enter Your Transaction No"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('email')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                    </div>
                    <div class="m-8">
                            <button type="submit"
                                class=" text-white bg-[#ff4551] hover:bg-[#fd3744] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                    </div>
                    </form>
                </div>
                <div id="withdrawMenu" class="hidden">
                    <h1 class="ml-8 mt-4 font-bold text-2xl">Request A Withdraw</h1>
                    <h1 class="ml-8 mt-4"><span class="text-lg text-[#dc3545]">**</span>Every Withdraw Request has 10% charge</h1>
                    <h1 class="ml-8 "><span class="text-lg text-[#dc3545]">**</span>Minimum Withdraw Request 1000 Taka</h1>
                    <h1 class="ml-8 "><span class="text-lg text-[#dc3545]">**</span>We will pay you every night between 8pm and 9pm</h1>
                    <form class="" action="{{ route('user.withdraw') }}" method="post">
                    @csrf
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="method" class="block mb-2 text-sm font-medium  dark:text-white">Method<span class="text-lg text-[#dc3545]">*</span></label>
                            <select name="method" id="method" class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Method</option>
                                <option value="bkash">Bkash Send Money</option>
                                <option value="nogod">Nogod Send Money</option>
                            </select>
                            @error('method')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="lg:w-[45%] w-full">
                            <label for="number_type" class="block mb-2 text-sm font-medium  dark:text-white">Type<span class="text-lg text-[#dc3545]">*</span></label>
                            <select name="number_type" id="number_type" class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Number</option>
                                <option value="personal">Personal</option>
                            </select>
                            @error('number_type')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="amount" class="block mb-2 text-sm font-medium dark:text-white">Amount<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('amount')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                        <div class="lg:w-[45%] w-full">
                            <label for="receive_payment_number" class="block mb-2 text-sm font-medium dark:text-white">Your Bkash or Nagad Number<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="text" name="receive_payment_number" id="receive_payment_number" placeholder="Enter Your Number"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('receive_payment_number')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col space-y-4 lg:space-y-0 justify-between m-8">
                        <div class="lg:w-[45%] w-full">
                            <label for="password" class="block mb-2 text-sm font-medium dark:text-white">Your Id Password<span class="text-lg text-[#dc3545]">*</span></label>
                            <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                            @error('password')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror    
                        </div>
                    </div>
                    <div class="m-8">
                            <button type="submit"
                                class=" text-white bg-[#ff4551] hover:bg-[#fd3744] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
<script src="https://cdn.tailwindcss.com/2.2.19/tailwind.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
         $('#updateRoleBtn').on('click', function() {
        $(document).ready(function() {
                $.ajax({
                    url: "{{ route('user.finance') }}",
                    method: 'POST'
                });
        });
        });
    </script>
<script>
    document.getElementById("depositButton").addEventListener("click", function() {
        document.getElementById("withdrawMenu").classList.add("hidden");
        document.getElementById("withdrawButton").classList.remove("bg-[#ff4742]");
        document.getElementById("depositMenu").classList.remove("hidden");
        document.getElementById("depositButton").classList.add("bg-[#ff4742]");
    });
    document.getElementById("withdrawButton").addEventListener("click", function() {
        document.getElementById("withdrawMenu").classList.remove("hidden");
        document.getElementById("withdrawButton").classList.add("bg-[#ff4742]");
        document.getElementById("depositMenu").classList.add("hidden");
        document.getElementById("depositButton").classList.remove("bg-[#ff4742]");
        document.getElementById("depositButton").classList.add("hover:bg-[#ff4742]");
        document.getElementById("depositButton").classList.add("bg-[#2a2a2a]");
    });
</script>
{{-- <script>
     function fetchOptions() {
            const paymentMethod = $("#paymentMethod").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('user.payment',':paymentMethod') }}".replace(':paymentMethod', paymentMethod),
                method: 'POST',
                dataType: "json",
                success: function(response) {
                const accountSelect = $("#accountNumber");
                accountSelect.empty().append('<option value="">Select Account Number</option>');
                $.each(response, function(index, option) {
                    accountSelect.append('<option value="' + item.account + '">' + item.account + '</option>');
                });
                accountSelect.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                        console.log(error);
                    }
        });
    }
</script> --}}
</body>
</html>