<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>login</title>
</head>

<body class="bg-[#100429]">
    @include('partial/navbar')
    @if (Session::has('success'))
    <div id="success-message" class="flex justify-center mt-24 ">
        <div class="fixed text-center bg-green-500 text-white px-8 py-2 rounded">
            {{Session::get('success')}}
        </div>
    </div>
    @endif
    @if (Session::has('error'))
    <div id="success-message" class="flex justify-center mt-24 ">
        <div class="fixed text-center bg-red-600 text-white px-8 py-2 rounded">
            {{Session::get('error')}}
        </div>
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('success-message').remove();
        }, 4000);
    </script>
    <section>
        <div class="flex flex-col items-center  px-6 my-32 mx-auto">
            <div
                class="w-full sm:max-w-lg">
                <div class="p-6 space-y-4 md:space-y-6  bg-[#51236e] rounded-lg sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('user.doLogin') }}" method="post">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@gmail.com">
                            @error('email')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('password')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('partial/footer')
</body>

</html>