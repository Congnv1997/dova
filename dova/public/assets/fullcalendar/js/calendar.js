document.addEventListener('DOMContentLoaded', function() {
  "usestrict";
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

   

    /* initialize the calendar
    -----------------------------------------------------------------*/
 
 
    var calendarEl = document.getElementById('calendar');
     var initialLocaleCode = 'vi';
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
       eventSources: [

    // your event source
    {
      url: 'load-events/' + $("#idlop input[name=idlop]").val(),
      method: 'GET',
      color: 'yellow',   // a non-ajax option
      textColor: 'black' // a non-ajax option
    }

    // any other sources...

  ],
     
      locale:'vi',
      navLinks: true,
      
      editable: true,
      selectable: true,
      edittable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },
      

      eventDrop: function(element){
      let start=moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
      let end=moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
      let newEvent={
        _method:'PUT',
        id: element.event.id,
        start: start,
        end: end,
      };
      sendEvent(routeEvents('routeEventUpdate'),newEvent);
     

      },
       eventClick: function(element){
        clearMessages('#message');
         $("#formEvent")[0].reset();
        
       $('#modalCalendar').modal('show');
        let title=element.event.title;
       
       $('#modalCalendar #titleModal').text(title);
         $('#modalCalendar #giaovien-tkb option').each(function() {
                     if($(this).val() == element.event.extendedProps.idgiaovien) {
                     $(this).prop("selected", true);
               }
             });
         $('#modalCalendar #phonghoc-tkb option').each(function() {
                     if($(this).val() == element.event.extendedProps.idphonghoc) {
                     $(this).prop("selected", true);
               }
             });
     
      let start=moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
      let end=moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
       $("#modalCalendar input[name='start']").val(start);
       $("#modalCalendar input[name='end']").val(end);
        let color=element.event.backgroundColor;
       $("#modalCalendar input[name='color']").val(color);
       let id=element.event.id;
       $("#modalCalendar input[name='id']").val(id);
      },
      eventResize: function(element){
        let start=moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
      let end=moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");
      let newEvent={
        _method:'PUT',
        id: element.event.id,
        start: start,
        end: end,
      };
      sendEvent(routeEvents('routeEventUpdate'),newEvent);

      },
       select: function(element){
         clearMessages('#message');
       $("#formEvent")[0].reset();
        $('#modalCalendar').modal('show');
        $('#modalCalendar #titleModal').text('Thêm lịch học');
        let start=moment(element.start).format("DD/MM/YYYY HH:mm:ss");
        console.log(element);
        let end=moment(element.end).format("DD/MM/YYYY HH:mm:ss");
       $("#modalCalendar input[name='start']").val(start);
       $("#modalCalendar input[name='end']").val(end);
       
       $("#modalCalendar input[name='color']").val('#3788D8');
          calendar.unselect();
      },
      events: routeEvents('routeLoadEvents'),

    });
    calendar.render();

  });

