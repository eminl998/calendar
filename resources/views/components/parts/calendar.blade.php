<div class="mb-10 mt-10">
  <div class="mt-3" style="display: flex;justify-content:center;align-items:center ">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white px-4 py-6 rounded-lg">
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
            .fc-day-sun {
              background-color: rgba(255, 0, 0, 0.246) !important;
            }
            .fc-day-sat {
              background-color: rgba(91, 91, 91, 0.124) !important;
            }
            .fc-today {
              background-color: rgba(0, 255, 17, 0.125) !important;
            }
          </style>
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dayCellClassNames: function(info) {
                  var classNames = [];
                  if (info.date.getDay() === 0) {
                    classNames.push('fc-day-sun');
                  }
                  var today = new Date();
                  today.setHours(0, 0, 0, 0);
                  if (info.date.getTime() === today.getTime()) {
                    classNames.push('fc-today');
                  }
                  return classNames;
                },
                events: [
                  @foreach($approvedRequests as $request)
                  @php
                    $user = App\Models\User::find($request->user_id);
                  @endphp
                  {
                    title: '{{ $user->name }}',
                    start: '{{ $request->start_date }}',
                    end: '{{ $request->end_date }}',                      
                  },
                @endforeach


                ]
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
