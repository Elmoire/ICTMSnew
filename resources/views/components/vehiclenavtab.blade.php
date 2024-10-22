<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
         /* General styles */
         .tabularnavcontainer {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center; /* Center content horizontally */
         align-items: center; /* Center content vertically */
         height: 100vh; /* Full viewport height */
         }
         .tabularnavbar {
         display: flex;
         justify-content: center; /* Center nav contents horizontally */
         align-items: center; /* Center nav contents vertically */
         margin-bottom: 35px;
         font-size: 14px;
         margin-top:-10px;
         }
         .tabularnavbar .navbutton {
         display: inline-block;
         padding: 5px 0px;
         border-radius: 10px;
         background-color: #eeeeef;
         }
         .tabularnavbar span.navbutton > a {
         text-decoration: none;
         color: #747487;
         margin: 0 10px; /* Adjusted margin for better spacing */
         width: 230px; /* Adjusted width for better button sizing */
         text-align: center; /* Center text horizontally */
         display: inline-block; /* Ensure block behavior for padding and margin */
         }
         .tabularnavbar .navbutton .active {
         padding: 5px 20px;
         background-color: white;
         color: black;
         font-weight: bold;
         border-radius: 5px;
         box-shadow: rgba(0, 0, 0, 0.12) 0px 3px 8px;
         }
         @media (max-width: 768px) {
         .tabularnavbar {
         display:flex;
         align-items: center; /* Align items to the start on smaller screens */
         padding: 14px; /* Add padding for better spacing */
         justify-content: center; /* Center align flex items */
         font-size:13px;
         }
         .tabularnavbar .navbutton {
         padding: 5px 8px; /* Adjust padding for smaller screens */
         margin-bottom: 10px; /* Add spacing between buttons */
         }
         .tabularnavbar span.navbutton > a {
         margin: 0; /* Reset margin for smaller screens */
         width: auto; /* Allow width to be dynamic based on content */
         }
         .tabularnavbar .navbutton .active {
         padding: 5px 15px; /* Adjust padding for active button on smaller screens */
         }
         }
      </style>
   </head>
   <body class="tabularnavcontainer">
      <nav class="tabularnavbar">
         <span class="navbutton">
         <a href="{{ route('dashboard') }}">Conference Requests List</a>
         <a href="{{ route('VehicleTabular') }}" class="active">Vehicle Requests List</a>
         </span>
      </nav>
   </body>
</html>