<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Bank Account</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
@include('../partial/error_success')
<section>
    <div class="flex flex-col items-center  ">
        <div 
            class=" w-full h-full px-6 my-8 mx-auto sm:max-w-xl">
            <div class="p-6 space-y-4 md:space-y-6 bg-[#51236e] rounded-lg sm:p-8">
                <h1
                    class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white">
                    Add Bank Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('admin.bankAccount') }}" method="post">
                    @csrf
                    <div>
                        <label for="method" class="block mb-2 text-sm font-medium text-white">Account Type<span class="text-lg text-[#dc3545]">*</span></label>
                        <select name="method" id="method" class="w-full h-[32px]  px-[12px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select Method</option>
                            <option value="bkash">Bkash Send Money</option>
                            <option value="nogod">Nagad Send Money</option>
                        </select>
                        @error('method')
                        <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="account" class="block mb-2 text-sm font-medium text-white">Account Number<span class="text-xl text-[#dc3545]">*</span></label>
                        <input type="text" name="account" id="account"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your account Number" >
                        @error('account')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>