<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Dashboard</title>
</head>
<body class="bg-[#100429]">
@include('admin/admin_navbar')
@include('../partial/error_success')
 <h1 class="text-center mt-2 text-5xl text-yellow-400">{{Auth::guard('admin')->user()->name}} Welcome to admin page</h1>
</body>
</html>