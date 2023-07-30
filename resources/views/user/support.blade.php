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
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
{{-- @include('../partial/error_success') --}}
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0 lg:pb-0 pb-[60px]">
    <div class="flex justify-center text-white mb-[60px]">
        <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[80%] w-full bg-[#51236e] rounded-lg">
                <div>
                    <h1 class="w-full  border-b border-black p-2 text-2xl">Contact Information</h1>
                    <div class=" overflow-x-auto p-6">
                        <table class="w-full text-sm text-left text-white dark:text-gray-400">
                            <thead>
                                <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-3 py-3 text-center">
                                        Social Media
                                    </th>
                                    <th class="px-3 py-3 text-center">
                                        Link
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-bold">
                                        Facebook
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="https://www.facebook.com/profile.php?id=100095211092672" target="_blank">https://www.facebook.com/profile.php?id=100095211092672</a>
                                    </td>
                                </tr>
                                <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-bold">
                                        What's Up
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="https://chat.whatsapp.com/KsaoWGWf744Bz3gBWegOSy" target="_blank">https://chat.whatsapp.com/KsaoWGWf744Bz3gBWegOSy</a>
                                    </td>
                                </tr>
                                <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-bold">
                                        Telegram Group
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="https://t.me/moonstars7039" target="_blank">https://t.me/moonstars7039</a>
                                    </td>
                                </tr>
                                <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-bold">
                                        Telegram Channel
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="https://t.me/+c5f1Qt_HE7JhMmM1" target="_blank">https://t.me/+c5f1Qt_HE7JhMmM1</a>
                                    </td>
                                </tr>
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