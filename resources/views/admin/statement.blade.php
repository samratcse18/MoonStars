<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Statement</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
{{-- @include('../partial/error_success') --}}
<div class="flex justify-center text-white mb-[60px]">
    <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
        <div class="lg:w-[100%] w-full bg-[#51236e] rounded-lg">
            <div>
                <h1 class="w-full  border-b border-black p-2  text-2xl"><i class="mr-2 fas fa-sticky-note"></i>My Statement</h1>
                <div class=" text-white m-4">
                    <button id="depositButton" class="border-2 border-solid border-[#ff4648] p-2 m-2  font-bold bg-[#ff4742] rounded-sm w-[120px]">All Deposit</button>
                    <button id="withdrawButton" class="border-2 border-solid border-[#ff4648] p-2 m-2 bg-[#2a2a2a] font-bold hover:bg-[#ff4742] rounded-sm w-[120px]">All Withdraw</button>
                </div>
            </div>
            <div id="depositMenu" class="mt-4">
                <h1 class="ml-8">All Deposit</h1>
                <h1 class="ml-8">Deposit Amount: {{$total_deposit}}</h1>
                <div class=" overflow-x-auto p-6">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <thead>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-3 py-3">
                                    UID
                                </th>
                                <th class="px-3 py-3">
                                    To
                                </th>
                                <th class="px-3 py-3">
                                    From
                                </th>
                                <th  class="px-3 py-3">
                                    Amount
                                </th>
                                <th class="px-3 py-3">
                                    TrXID
                                </th>
                                <th  class="px-3 py-3">
                                    Through
                                </th>
                                <th class="px-3 py-3">
                                    Requested At
                                </th>
                                <th class="px-3 py-3">
                                    Action At
                                </th>
                                <th class="px-3 py-3">
                                    Status
                                </th>
                                <th class="px-3 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($deposits as $deposit)
                        <?php
                            if($deposit->status == "pending"){
                                            $text = "Pending";
                                            $color = "[#968625]";
                            }else if($deposit->status == "approve"){
                                            $text = "Approve";
                                            $color = "[#198754]";
                            }else if($deposit->status == "rejected"){
                                            $text = "Rejected";
                                            $color = "[#dc3545]";
                            }
                        ?>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td  class="px-3 py-3">
                                    {{$deposit->UID}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$deposit->receive_payment_number}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$deposit->user_payment_number}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$deposit->amount}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$deposit->transaction_no}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$deposit->method}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$deposit->requested_at}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$deposit->action_at}}
                                </td>
                                <td class="px-3 py-3 m-2 text-white bg-<?php echo $color ?>">
                                    {{$text}}
                                </td>
                                <td class="px-3 py-3 flex space-x-2">
                                    <a href='admin_statement/deposit_approve/{{ $deposit->id }}'>
                                        <button  class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Approve</button>
                                    </a>
                                    <a href='admin_statement/deposit_rejected/{{ $deposit->id }}'>
                                        <button  class="text-xs text-black bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Rejected</button>
                                    </a>
                                </td>
                            </tr>  
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="withdrawMenu" class="hidden">
                <h1 class="ml-8">All Withdraw</h1>
                <h1 class="ml-8">Withdraw Amount: {{$total_withdraw}}</h1>
                <div class=" overflow-x-auto p-6">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <thead>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <th  class="px-3 py-3">
                                    UID
                                </th>
                                <th  class="px-3 py-3">
                                    To
                                </th>
                                <th class="px-3 py-3">
                                    From
                                </th>
                                <th  class="px-3 py-3">
                                    Amount
                                </th>
                                <th class="px-3 py-3">
                                    TrXID
                                </th>
                                <th  class="px-3 py-3">
                                    Through
                                </th>
                                <th class="px-3 py-3">
                                    Requested At
                                </th>
                                <th class="px-3 py-3">
                                    Action At
                                </th>
                                <th class="px-3 py-3">
                                    Status
                                </th>
                                <th class="px-3 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($withdraws as $withdraw)
                        <?php
                            if($withdraw->status == "pending"){
                                            $text = "Pending";
                                            $color = "[#968625]";
                            }else if($withdraw->status == "approve"){
                                            $text = "Approve";
                                            $color = "[#198754]";
                            }else if($withdraw->status == "rejected"){
                                            $text = "Rejected";
                                            $color = "[#dc3545]";
                            }
                        ?>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td  class="px-3 py-3">
                                    {{$withdraw->UID}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$withdraw->receive_payment_number}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$withdraw->payment_number}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{intval($withdraw->amount)-(intval($withdraw->amount)*.1)}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$withdraw->transaction_no}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$withdraw->method}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$withdraw->requested_at}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$withdraw->action_at}}
                                </td>
                                <td class="px-3 py-3 m-2 text-white bg-<?php echo $color ?>">
                                    {{$text}}
                                </td>
                                <td class="px-3 py-3 flex space-x-2">
                                    <a href='admin_statement/withdraw_approve/{{ $withdraw->id }}'>
                                        <button id="final_fee" class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Approve</button>
                                    </a>
                                    <a href='admin_statement/withdraw_rejected/{{ $withdraw->id }}'>
                                        <button id="final_fee" class="text-xs text-black bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Rejected</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
<script src="https://cdn.tailwindcss.com/2.2.19/tailwind.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
                $.ajax({
                    url: "{{ route('admin.statement') }}",
                    method: 'POST'
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
</body>
</html>