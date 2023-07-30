<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Bank Account List</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
@include('../partial/error_success')
<div class="flex justify-center text-white mb-[60px]">
    <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
        <div class="lg:w-[80%] w-full bg-[#51236e] rounded-lg">
            <div>
                <h1 class="w-full  border-b border-black p-2  text-2xl"><i class="mr-2 fas fa-sticky-note"></i>Bank Account List</h1>
            </div>
            <div id="depositMenu" class="mt-4">
                <div class=" overflow-x-auto p-6">
                    <table class="w-full text-sm text-center text-white dark:text-gray-400">
                        <thead>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-3 py-3">
                                    UID
                                </th>
                                <th class="px-3 py-3">
                                    Method
                                </th>
                                <th class="px-3 py-3">
                                    Account
                                </th>
                                <th class="px-3 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($accounts as $account)
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td  class="px-3 py-3">
                                    {{$account->id}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$account->method}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$account->account}}
                                </td>
                                <td class="px-3 py-3 flex justify-center space-x-2">
                                    <a href='bank_account_list/bank_account_list_delete/{{ $account->id }}'>
                                        <button  class="text-xs text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Delete</button>
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
</body>
</html>