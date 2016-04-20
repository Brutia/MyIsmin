@extends('common.layout') @section('content')

<script type="text/javascript" src="{{URL::to('assets/js/dateformat.js')}}"></script>
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
                    end  : e.end,
                    description: e.description,
                    lieu: e.lieu
                });
            });
        }
    });
    console.log(retour);
    $('#calendar').fullCalendar({
        lang: 'fr',
        eventLimit: true, // allow "more" link when too many events
        events: retour,
        defaultView: 'agendaWeek',
        eventRender: function(event, element) {

            element.append("<br/>Description: " + event.description);
            element.append("<br/><br/>Lieu: "+ event.lieu);
        }
    });
};

</script>
<div id='calendar'></div>
@endsection
