<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Deposit</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
 <div class="ml-[250px] mt-[55px] text-white">
    <!-- Main content of your page goes here -->
    <div class="py-4 bg-slate-500 text-center text-5xl">Deposit Request</div>
    <section class="">
        <div class="flex flex-col items-center  px-6 my-4 mx-auto">
            <div
                class="w-full sm:max-w-lg">
                <div class="p-6 space-y-4 md:space-y-6 bg-[#51236e] rounded-lg sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign Up
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('user.create') }}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Name" >
                            @error('name')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Username" >
                            @error('username')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Id<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@gmail.com" >
                            @error('email')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="number" name="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Phone Number" >
                            @error('phone')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="promocode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promocode (Optional)</label>
                            <input type="text" name="promocode" id="promocode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Promocode">
                            @error('promocode')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('password')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="cpassword"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password<span class="text-xl text-[#dc3545]">*</span></label>
                            <input type="password" name="cpassword" id="cpassword" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('cpassword')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            up</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>  
</body>
</html>