$(function() {

    if ( $('#calendar').length ) {
        getEnvets();
    }

    // Get events AJAX
    function getEnvets() {
        $.getJSON( events.ajax, { action: "events", nonce: events.nonce }, function( response, status ){
            calendar(response.data);
        });
    }

    // Render Calendar
    function calendar(arrayEvents) {
        
        $('#calendar').fullCalendar({
            defaultView: 'month',
            weekNumbers: true,
            locale: "pt-br",
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            selectable: true,
            editable: true,
            eventLimit: true,
            events: arrayEvents,
        });
    }
});