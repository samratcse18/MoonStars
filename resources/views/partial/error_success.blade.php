
<div id="successModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

        <div class="inline-block align-bottom bg-green-400 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="flex justify-end">
                <div id="successCloseButton" class="bg-white cursor-pointer p-1">
                    <i class="fa fa-times mx-1" style="font-size: 24px; color: #cc0000;"></i>
                </div>
            </div>
            <div class="bg-green-300 px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Success icon goes here (e.g., checkmark) -->
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Success</h3>
                        <div class="mt-2">
                            <p class="text-sm text-black">{{Session::get('success')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="errorModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

        <div class="inline-block align-bottom bg-red-400 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="flex justify-end">
                <div id="errorCloseButton" class="bg-white cursor-pointer p-1">
                    <i class="fa fa-times mx-1" style="font-size: 24px; color: #cc0000;"></i>
                </div>
            </div>
            <div class="bg-red-300 px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Error icon goes here (e.g., cross) -->
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Error</h3>
                        <div class="mt-2">
                            <p class="text-sm text-black">{{Session::get('error')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Session::has('success'))
        <script>
            document.getElementById("successModal").classList.remove("hidden");
            setTimeout(function() {
                document.getElementById("successModal").classList.add("hidden");
            }, 3000); // 3000 milliseconds (3 seconds) timeout
            document.getElementById("successCloseButton").addEventListener("click", function() {
            document.getElementById("successModal").classList.add("hidden");
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            document.getElementById("errorModal").classList.remove("hidden");
            setTimeout(function() {
                document.getElementById("errorModal").classList.add("hidden");
            }, 3000); // 3000 milliseconds (3 seconds) timeout
            document.getElementById("errorCloseButton").addEventListener("click", function() {
            document.getElementById("errorModal").classList.add("hidden");
            });
        </script>
    @endif