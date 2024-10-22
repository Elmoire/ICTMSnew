<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
      <!-- Bootstrap CSS (for table styles) -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome Icons -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
      <!-- Styles -->
      <style>
         #content main .box-info {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
         grid-gap: 24px;
         margin: 36px;
         margin-top:0px;
         }
         #content main .box-info li {
         padding: 24px;
         background: white;
         border-radius: 20px;
         display: flex;
         align-items: center;
         grid-gap: 24px;
         box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
         }
         #content main .box-info li .bx {
         width: 80px;
         height: 80px;
         border-radius: 10px;
         font-size: 36px;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         #content main .box-info li .bx {
         background: white;
         color: #354e7d;
         }
         #content main .box-info li .text h3 {
         font-size: 24px;
         font-weight: 600;
         color: var(--dark);
         }
         #content main .box-info li .text p {
         color: var(--dark);	
         }
         a:hover {
         text-decoration: none;
         }
         .requests {
         padding: 0px 50px;
         position: relative;
         z-index: 2; /* Ensure this content is above the footer */
         }
         .filter {
         display: flex;
         justify-content: space-between;
         }
         .form {
         position: relative;
         width: 250px;
         }
         .form .fa-search {
         position: absolute;
         top: 10px;
         left: 20px;
         color: #747487;
         }
         .form span {
         position: absolute;
         right: 17px;
         top: 13px;
         padding: 2px;
         border-left: 1px solid #d1d5db;
         }
         .left-pan {
         padding-left: 7px;
         }
         .left-pan i {
         padding-left: 10px;
         }
         .form-input {
         height: 35px;
         text-indent: 33px;
         border-radius: 5px;
         background-color: white;
         border: none;
         color: #6E6E71;
         }
         .form-input:focus {
         box-shadow: none;
         border: none;
         }
         .tableactions i {
         display: inline-block;
         margin-right: 10px;
         font-size: 20px;
         z-index: 3;
         cursor:pointer;
         }
         #iconborder {
         margin-right: 10px;
         border-right: 1px solid #d1d5db;
         padding-right: 20px;
         }
         @media (max-width: 768px) {
         .tableactions i {
         margin-top: 10px;
         font-size: 15px;
         margin-right: 5px;
         }
         }
         .tabview {
         font-family: Arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
         font-size: 15px;
         overflow-x: auto;
         border-radius: 10px;
         background-color: #FFFFFF;
         box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
         position: relative;
         z-index: 2; /* Ensure the table is on top of the footer */
         }
         .tabview table {
         width: 100%;
         padding-top: 10px;
         border-spacing: 0;
         }
         .tabview th, .tabview td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #E5E5E5;
         }
         .tabview th {
         font-weight: bold;
         color: #333;
         }
         .tabview td {
         color: #666;
         }
         .tabview tr:hover {
         background-color: #F7F7F7;
         }
         .approved {
         padding: 4px 13px;
         background-color: #CBDCF9;
         color: #103680;
         font-size: 12px;
         font-weight: bold;
         border-radius: 5px;
         }
         .disapproved {
         padding: 4px 13px;
         background-color: #ff6961;
         color: white;
         font-size: 12px;
         font-weight: bold;
         border-radius: 5px;
         }
         .pending {
         padding: 4px 13px;
         background-color: #FFF3DD;
         color: #aa8345;
         font-size: 12px;
         font-weight: bold;
         border-radius: 5px;
         }
         #actions {
         margin: 2px 8px;
         cursor: pointer;
         color: black;
         }
         .end {
         position: fixed;
         bottom: 0;
         left: 0;
         width: 100%;
         height: 100px; /* Adjust the height as needed */
         background: #354e7d;
         z-index: 1; /* Ensure the footer is below the table */
         }
         .dropbtn {
         color:black;
         font-size: 16px;
         border: none;
         cursor: pointer;
         }
         .dropdown {
         position: relative;
         display: inline-block;
         z-index: 1000; /* Ensure dropdown is on top of the table */
         }
         .dropdown-content {
         display: none;
         position: absolute;
         right: 0;
         background-color: #f9f9f9;
         min-width: 260px;
         box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
         z-index: 1000; /* Ensure dropdown content is on top */
         }
         .dropdown-content p{
         padding-top:10px;
         padding-left:10px;
         color:black;
         font-weight:bold;
         font-size:18px;
         }
         #margincheck{
         margin-bottom:10px;
         }
         #filterlabel{
         margin-bottom:10px;
         }
         .dropdown-content a {
         color: black;
         padding: 10px 16px;
         text-decoration: none;
         display: block;
         }
         .dropdown-content a:hover {
         background-color: #f1f1f1;
         }
         .dropdown:hover .dropdown-content {
         display: block;
         }
         .buttons{
         display:flex;
         justify-content:right;
         margin-top:20px;
         margin-bottom:10px;
         }
         .applybtn , .cancelbtn {
         background-color: #354e7d;
         color:white;
         border-radius:20px;
         padding:5px;
         margin: 0 10px 10px 0;
         width: 90px;
         }
         @media screen and (max-width: 484px) {
         .form {
         width:160px;
         }
         }
         @media (max-width: 768px) {
         .chart-container {
         width: 90%;
         margin: 10px auto;
         }
         }
         .chart-container {
         width: 90%;
         margin: 20px auto;
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         margin: 0 auto;
         width: 100%;
         gap: 20px; /* Space between charts */
         }
         .chart-container > div {
         flex: 1 1 45%; /* Flex-grow, Flex-shrink, Flex-basis */
         min-width: 300px; /* Minimum width of the charts */
         height: 500px;
         }
         @media (max-width: 768px) {
         .chart-container > div {
         flex: 1 1 100%; /* Stack charts vertically on small screens */
         height: 400px; /* Adjust height for smaller screens */
         }
         }
         .bar-chart-wrapper {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         margin: 50px auto;
         }
         .bar-chart-wrapper h1{
         font-size:30px;
         font-weight:bold;
         margin-bottom:10px;
         }
         .simple-bar-chart{
         --line-count: 10;
         --line-color: currentcolor;
         --line-opacity: 0.25;
         --item-gap: 2%;
         --item-default-color: #060606;
         height: 17rem;
         display: grid;
         grid-auto-flow: column;
         gap: var(--item-gap);
         align-items: end;
         padding-inline: var(--item-gap);
         --padding-block: 1.5rem; /*space for labels*/
         padding-block: var(--padding-block);
         position: relative;
         isolation: isolate;
         width:90%;
         }
         .simple-bar-chart::after{
         content: "";
         position: absolute;
         inset: var(--padding-block) 0;
         z-index: -1;
         --line-width: 1px;
         --line-spacing: calc(100% / var(--line-count));
         background-image: repeating-linear-gradient(to top, transparent 0 calc(var(--line-spacing) - var(--line-width)), var(--line-color) 0 var(--line-spacing));
         box-shadow: 0 var(--line-width) 0 var(--line-color);
         opacity: var(--line-opacity);
         }
         .simple-bar-chart > .item{
         height: calc(1% * var(--val));
         background-color: var(--clr, var(--item-default-color));
         position: relative;
         animation: item-height 1s ease forwards
         }
         @keyframes item-height { from { height: 0 } }
         .simple-bar-chart > .item > * { position: absolute; text-align: center }
         .simple-bar-chart > .item > .label { inset: 100% 0 auto 0 }
         .simple-bar-chart > .item > .value { inset: auto 0 100% 0 }
      </style>
   </head>
   <body class="font-sans antialiased">
      <x-banner />
      <div class="min-h-screen bg-gray-100">
         @livewire('navigation-menu')
         <!-- Page Heading -->
         @if (isset($header))
         <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               {{ $header }}
            </div>
         </header>
         @endif
         <!-- Page Content -->
         <main>
            {{ $slot }}
         </main>
      </div>
      @stack('modals')
      @livewireScripts
      <script src="popper/popper.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   </body>
</html>