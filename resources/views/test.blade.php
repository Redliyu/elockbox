<!DOCTYPE html>
<html>
<head>
    <title>Attach to custom icon</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="{{ asset('cssnew/calendar/dhtmlxcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/calendar/roboto.css') }}" rel="stylesheet">
    <script src="{{ asset('cssnew/calendar/dhtmlxcalendar.js') }}"></script>
    <style>
        #calendar_input {
            border: 1px solid #dfdfdf;
            font-family: Roboto, Arial, Helvetica;
            font-size: 14px;
            color: #404040;
        }
        #calendar_icon {
            vertical-align: middle;
            cursor: pointer;
        }
    </style>
    <script>
        var myCalendar;
        function doOnLoad() {
            myCalendar = new dhtmlXCalendarObject({button: "calendar_icon"});
            myCalendar.attachEvent("onClick", function(){
                document.getElementById("date_here").innerHTML = myCalendar.getFormatedDate();
            });
        }
    </script>
</head>
<body onload="doOnLoad();">
<div style="position:relative;height:350px;">
    <span><img id="calendar_icon" src="{{ asset('cssnew/calendar/calendar.png') }}" border="0"></span>
    <span id="date_here">&nbsp;</span>
</div>
</body>
</html>