<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Refer</title>
</head>
<body class="bg-[#100429]">
@include('user/user_navbar')
@include('user/footer_navbar')
@include('user/side_bar')
{{-- @include('../partial/error_success') --}}
<div class="lg:ml-[250px] ml-0 lg:pt-[60px] pt-0">
    <div class="flex justify-center text-white mb-[60px]">
        <div class="lg:w-[100%] w-[95%] flex justify-center items-center">
            <div class="lg:w-[60%] md:w-full bg-[#51236e] rounded-lg">
                <div>
                    <h1 class="w-full  border-b border-black p-2 text-2xl">My Referral Link:</h1>
                    <h1 id="referLink" class="text-center mt-4 text-xl text-yellow-400">https://moonstars24.com/?refer_code={{Auth::guard('user')->user()->id}}{{Auth::guard('user')->user()->username}}</h1>
                    <div class="flex justify-end mt-4">
                        <button id="referButton" class=" text-white bg-[#ff4551] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Share Your Refer Link</button> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<script>
    const referLink = document.getElementById('referLink');
    const shareButton = document.getElementById('referButton');
    shareButton.addEventListener('click', function () {
            const referralLink = referLink.innerText;
            if (navigator.share) {
                navigator.share({
                    title: 'My Referral Link',
                    text: 'Check out this awesome website!',
                    url: referralLink,
                }).then(() => {
                    console.log('Referral link shared successfully!');
                }).catch((error) => {
                    console.error('Error sharing referral link:', error);
                });
            } else {
                // Fallback for browsers that do not support Web Share API
                const dummyLink = document.createElement('a');
                dummyLink.href = referralLink;
                dummyLink.target = '_blank';
                dummyLink.rel = 'noopener noreferrer';
                dummyLink.click();
            }
        });
</script>
</body>
</html>