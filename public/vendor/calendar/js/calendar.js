
  document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/
/*
    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });*/

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new FullCalendar.Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale: 'pt-br',
      navLinks: true,
      //eventLimit: true,
      editable: true,
      /*droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      }*/
      eventClick: function(event){
        $("#modalCalendar").modal("show");
        $("#modalCalendar #titleModal").text("Detalhes Agendamento");
        $("#modalCalendar button.deletEvent").css("display","flex");
        
        resetForm("#agendamentoForm");
  
        let id = event.event.extendedProps.Id;
        $("#modalCalendar input[name='id']").val(id);


        let title = event.event.title;
        $("#modalCalendar input[name='cliente']").val(title);

  
//        let start = moment(event.event.start).format("DD/MM/YYYY HH:mm:ss");
        $("#modalCalendar input[name='data-init']").val(getDateNow(event.event.start));

//        let end = moment(event.event.end).format("DD/MM/YYYY HH:mm");
        $("#modalCalendar input[name='data-fim']").val(getDateNow(event.event.end));

        let barbeiro = event.event.extendedProps.barbeiro;
        $("#modalCalendar input[name='barbeiro']").val(barbeiro);
        let servico = event.event.extendedProps.servico;
        $("#modalCalendar input[name='servico']").val(servico);
 
        let status = event.event.extendedProps.status;
        $("#modalCalendar input[name='status']").val(status);
        VerificaStatus(status);
      },
      events:routeEvents('routeLoadEvents'),
    });
        function getDateNow(evento) {

          let today = evento;
          let date = today.getFullYear() + '-' +
              (today.getMonth() + 1).toString().padStart(2, '0') + '-' +
              today.getDate().toString().padStart(2, '0');
          let time = today.getHours().toString().padStart(2, '0') + ':' + today.getMinutes().toString().padStart(2, '0');
          return date + 'T' + time;
      }
      


    calendar.render();
    

    // jQuery disponível

  });
