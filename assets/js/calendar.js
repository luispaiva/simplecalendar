jQuery(function($) {

    var dialog;

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
            plugins: [ 'interaction' ],
            defaultView: 'month',
            weekNumbers: true,
            locale: "pt-br",
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                $("#eventContent").dialog({
                    modal: true, 
                    title: 'Novo evento', 
                    width:500,
                    at: 'center',
                    buttons: {
                        Cancel: function() {
                            $( this ).dialog( "close" );
                        },
                        "Salvar alterações": function() {
                            $( this ).dialog( "close" );
                        }
                    },
                });
            },
            editable: true,
            eventLimit: true,
            events: arrayEvents,
            eventRender: function (event, element) {              
                element.attr('href', 'javascript:void(0);');

                element.click(function() {
                    $("#eventTitle").val(event.title);
                    $("#startTime").val(moment(event.start).format('MMM Do h:mm A'));
                    $("#endTime").val(moment(event.end).format('MMM Do h:mm A'));
                    $("#eventInfo").val(event.description);
                    $("#eventLink").attr('href', event.url);

                    $("#eventContent").dialog({
                        modal: true, 
                        title: event.title, 
                        width:500,
                        at: 'center',
                        buttons: {
                        Cancel: function() {
                            $( this ).dialog( "close" );
                        },
                        "Salvar alterações": function() {
                            $( this ).dialog( "close" );
                        }
                    },
                    });
                });
            }
        });
    }

    $( ".datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      dateFormat: 'dd-mm-yy'
    });

});