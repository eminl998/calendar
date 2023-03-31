<div class="mb-10 mt-10">
    <div class="mt-3" style="display: flex;justify-content:center;align-items:center ">
      <div class="bg-white dark:bg-gray-800 text-black dark:text-white px-4 py-6 rounded-xl">
        <!DOCTYPE html>
          <html lang='en'>
            <head>
              <meta charset='utf-8' />
              <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
              <style>
                #calendar {
                  width: 900px;
                  height: 700px;
                }
              </style>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  var calendarEl = document.getElementById('calendar');
                  var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                  });
                  calendar.render();
                });
              </script>
            </head>
            <body>
              <div id='calendar'></div>
            </body>
          </html>
          </div>
    </div>
</div>
