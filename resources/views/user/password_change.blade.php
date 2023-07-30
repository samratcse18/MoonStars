<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Password Change</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
@include('../partial/error_success')
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0 lg:pb-0 pb-[120px]">
    <div class="flex justify-center text-white">
        <div class="lg:w-[100%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[60%] w-full bg-[#51236e] p-6 space-y-4 md:space-y-6  rounded-lg sm:p-8">
                            <h1 class="w-full  border-b border-black p-2 text-2xl">Password Change</h1>
                            <form class="space-y-4 md:space-y-6 w-full" action="{{ route('user_password_change_action')}}" method="post">
                                @csrf
                                <div>
                                    <label for="oldpassword"
                                        class="block mb-2 text-sm font-medium  dark:text-white">Old Password<span class="text-xl text-[#dc3545]">*</span></label>
                                    <input type="password" name="oldpassword" id="oldpassword" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('oldpassword')
                                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium  dark:text-white">New Password<span class="text-xl text-[#dc3545]">*</span></label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('password')
                                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cpassword"
                                        class="block mb-2 text-sm font-medium dark:text-white">Confirm New Password<span class="text-xl text-[#dc3545]">*</span></label>
                                    <input type="password" name="cpassword" id="cpassword" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('cpassword')
                                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                            </form>
            </div>
        </div> 
    </div>
</div>
</body>
</html>