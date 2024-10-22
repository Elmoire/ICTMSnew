
<head>
    <title>Conference Calendar</title>
    <link rel= "shortcut icon" type="image/png" href="{{('/Logo/logo.png')}}">
<title>Conference Calendar</title>
<link rel= "shortcut icon" type="image/png" href="{{('/Logo/logo.png')}}">
</head>
<x-user-layout>
        <x-slot name="header">
            <!-- <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Conference Room Form') }}
            </h1> -->
        </x-slot>

        <div class="py-12">
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-userconcalendar/>
                </div>
            </div>
        </div>
    </x-user-layout>
