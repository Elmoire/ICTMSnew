<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
      <style>
         .chart-container {
         width: 90%;
         margin: 20px auto;
         }
         @media (max-width: 768px) {
         .chart-container {
         width: 90%;
         margin: 10px auto;
         }
         }
      </style>
   </head>
   <body>
      <section id="content">
         <main>
            <ul class="box-info">
               <li>
                  <i class='bx bxs-group'></i>
                  <span class="text">
                     <h3>1020</h3>
                     <p>Pending Requests</p>
                  </span>
               </li>
               <li>
                  <i class='bx bxs-group'></i>
                  <span class="text">
                     <h3>2834</h3>
                     <p>Daily Requests</p>
                  </span>
               </li>
               <li>
                  <i class='bx bxs-group'></i>
                  <span class="text">
                     <h3>20543</h3>
                     <p>Monthly Requests</p>
                  </span>
               </li>
            </ul>
         </main>
      </section>
      <div class="bar-chart-wrapper">
         <h1>Total Requests per Office</h1>
         <div class="simple-bar-chart">
            <div class="item" style="--clr: #5EB344; --val: 80">
               <div class="label">Label 1</div>
               <div class="value">80%</div>
            </div>
            <div class="item" style="--clr: #FCB72A; --val: 50">
               <div class="label">Label 2</div>
               <div class="value">50%</div>
            </div>
            <div class="item" style="--clr: #F8821A; --val: 100">
               <div class="label">Label 3</div>
               <div class="value">100%</div>
            </div>
            <div class="item" style="--clr: #E0393E; --val: 15">
               <div class="label">Label 4</div>
               <div class="value">15%</div>
            </div>
            <div class="item" style="--clr: #963D97; --val: 1">
               <div class="label">Label 5</div>
               <div class="value">1%</div>
            </div>
            <div class="item" style="--clr: #069CDB; --val: 90">
               <div class="label">Label 6</div>
               <div class="value">90%</div>
            </div>
         </div>
      </div>
      
      <!-- First Chart Container -->
      <div class="chart-container">
         <div id="chartContainer1" style="height: 500px;"></div>
      </div>

      <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
      <script>
         window.onload = function() {
         	// First Chart
         	var chart1 = new CanvasJS.Chart("chartContainer1", {
         		animationEnabled: true,
         		title: {
         			text: "Vehicle Destinations"
         		},
         		data: [{
         			type: "pie",
         			startAngle: 240,
         			yValueFormatString: "##0.00\"%\"",
         			indexLabel: "{label} {y}",
         			dataPoints: [
         				{y: 79.45, label: "Compostela Valley"},
         				{y: 7.31, label: "Cagayan de Oro"},
         				{y: 7.06, label: "Tagum"},
         				{y: 4.91, label: "Surigao"},
         				{y: 1.26, label: "Sultan Kudarat"}
         			]
         		}]
         	});
         	chart1.render();
         }
      </script>
   </body>
</html>