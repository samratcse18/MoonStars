<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Refer User</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0 lg:pb-0 pb-[60px]">
    <div class="flex justify-center text-white mb-[60px]">
        <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[100%] w-full bg-[#51236e] rounded-lg">
                <div>
                    <h1 class="w-full  border-b border-black p-2  text-2xl"><i class="mr-2 fas fa-sticky-note" style="font-size: 24px; color: #33cc33;"></i>All Refer User List</h1>
                </div>
                <div class="mt-4">
                    <div class=" overflow-x-auto p-6">
                        <table class="w-full text-sm text-center text-white dark:text-gray-400">
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
                                    <th class="px-3 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            
                            <?php
                                $flag = false;
                                $referUsers = DB::select('SELECT * FROM deposits WHERE UID = ?', [$user->id]);
                                foreach ($referUsers as $referUser) {
                                    if($referUser->status == "approve"){
                                        $flag = true;
                                    }
                                }
                                if($flag == true){
                                    $text = "Active";
                                    $color = "[#198754]";
                                }
                                else{              
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
                                    <td class="px-3 py-3 m-2 text-white bg-<?php echo $color ?>">
                                        {{$text}}
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
</div>
</body>
</html>