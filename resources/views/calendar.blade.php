@extends('common.layout') @section('content')

<script>
var test;
document.onreadystatechange = function () {
    if(document.readyState != "complete")
        return;
    var retour = [];
    $.ajax({
        'async': false,
        'global': false,
        'url': "{{URL::to("/calendar/event")}}",
        'dataType': "json",
        'success': function (data) {
            $.each(data,function(i, e){
                retour.push({
                    title: e.title,
                    start: e.start,
                    end  : e.end
                });
            });
        }
    });
    console.debug(retour);
    $('#calendar').fullCalendar({
        lang: 'fr',
        eventLimit: true, // allow "more" link when too many events
        events: retour,
        defaultView: 'agendaWeek',
        
    });
};

</script>
<div id='calendar'></div>
@endsection