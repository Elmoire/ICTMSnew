<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="justify-center items-center m-1 bg-white p-4 shadow-lg rounded-lg">
        <!-- Display the logo if provided -->
        @isset($logo)
            {{ $logo }}
        @endisset
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
