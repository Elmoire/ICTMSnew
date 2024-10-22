<!-- resources/views/user-vehicle-form.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Form</title>
    <link rel="shortcut icon" type="image/png" href="{{('/Logo/logo.png')}}">
</head>
<body style="background-image: linear-gradient(to bottom, #02225d,#677a9e)">
    <x-user-layout>
        <x-slot name="header">
            <!-- <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vehicle Form') }}
            </h1> -->
        </x-slot>

        <div class="py-12">
            <!-- <div class="max-w-7xl mx-auto sm:px-20"> -->
                <div class="overflow-hidden">
                    <x-vehicle-form/>
                </div>
        </div>
    </x-user-layout>
</body>
</html>
