<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>User List</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
@include('../partial/error_success')
<div class="flex justify-center text-white mb-[60px]">
    <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
        <div class="lg:w-[100%] w-full bg-[#51236e] rounded-lg">
            <div>
                <h1 class="w-full  border-b border-black p-2  text-2xl"><i class="mr-2 fas fa-sticky-note"></i>All User List</h1>
            </div>
            <div id="depositMenu" class="mt-4">
                <div class=" overflow-x-auto p-6">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <thead>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-3 py-3">
                                    UID
                                </th>
                                <th class="px-3 py-3">
                                    Name
                                </th>
                                <th class="px-3 py-3">
                                    Username
                                </th>
                                <th  class="px-3 py-3">
                                    Email
                                </th>
                                <th class="px-3 py-3">
                                    Phone
                                </th>
                                <th  class="px-3 py-3">
                                    Promo Code
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
                        @foreach ($users as $user)
                        <?php
                            if($user->status == "active"){
                                            $text = "Active";
                                            $color = "[#198754]";
                            }else if($user->status == "inactive"){
                                            $text = "InActive";
                                            $color = "[#dc3545]";
                            }
                        ?>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td  class="px-3 py-3">
                                    {{$user->id}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$user->name}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$user->username}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$user->email}}
                                </td>
                                <td  class="px-3 py-3">
                                    {{$user->phone}}
                                </td>
                                <td class="px-3 py-3">
                                    {{$user->promocode}}
                                </td>
                                <td class="px-3 py-3 m-2 text-white bg-<?php echo $color ?>">
                                    {{$text}}
                                </td>
                                <td class="px-3 py-3 flex space-x-2">
                                    <a href='admin_user_list/user_active/{{ $user->id }}'>
                                        <button  class="text-xs text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Active</button>
                                    </a>
                                    <a href='admin_user_list/user_inactive/{{ $user->id }}'>
                                        <button  class="text-xs text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">InActive</button>
                                    </a>
                                    <a href='admin_user_list/user_details/{{ $user->id }}'>
                                        <button  class="text-xs text-white bg-[#d15622] hover:bg-[#e65011] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Details</button>
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