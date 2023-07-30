<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Profile</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
<div class="flex justify-center text-white">
    <div class="lg:w-[80%] w-[95%] flex justify-center items-center">
        <div class="lg:w-[60%] w-full bg-[#51236e] rounded-lg">
            <div>
                <h1 class="w-full  border-b border-black p-2 text-2xl">Admin Information</h1>
                <div class=" overflow-x-auto p-6">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <tbody>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-bold">
                                    Image
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                    <img src="{{ asset('image/man.png') }}" width="100" height="100" alt="">
                                </td>
                            </tr>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-bold">
                                    Full Name
                                </td>
                                <td class="px-6 py-4">
                                    {{Auth::guard('admin')->user()->name}}
                                </td>
                            </tr>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-bold">
                                    Email Id
                                </td>
                                <td class="px-6 py-4">
                                    {{Auth::guard('admin')->user()->email}}
                                </td>
                            </tr>
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-bold">
                                    Phone Number
                                </td>
                                <td class="px-6 py-4">
                                    {{Auth::guard('admin')->user()->phone}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
</body>
</html>