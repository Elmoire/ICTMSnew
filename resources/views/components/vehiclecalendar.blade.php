<!DOCTYPE html>
<html>
  <head>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <style>
      /* Ensure the calendar is centered and the body takes full viewport height */
      

      /* Set the calendar to fit 90% of the width and height of the viewport */
      #calendar {
        width: 80%;
        height: 100%;
        margin: 0;
        padding: 0;
        margin-top: 4em;
        margin-left: 8em;
      }

      /* Responsive design adjustments for smaller screens */
      @media (max-width: 768px) {
        #calendar {
          width: 100%;
          height: 80vh; /* Adjust height on smaller screens */
          margin-left: 0em;
        }
      }
      .fc-event, .fc-daygrid-event, .fc-timegrid-event {
      font-size: 14px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .fc-event-title {
      font-weight: bold;
    }

    .fc-event-time {
      font-size: 12px;
      white-space: nowrap;
    }

    </style>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',  // Navigation buttons on the left
            center: 'title',          // Title (month and year) in the center
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // View buttons on the right
          },
          height: 'auto', // Let the calendar's height adjust automatically
          aspectRatio: 1.35, // Adjust the aspect ratio for a balanced size
          events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
              url: '/calendar/events', // Route to your Laravel controller method
              type: 'GET',
              success: function(data) {
                successCallback(data); // Pass events data to the calendar
              },
              error: function() {
                failureCallback();
              }
            });
          }
        });
        calendar.render();
      });
    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
s