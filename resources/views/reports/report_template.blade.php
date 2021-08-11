<!DOCTYPE html>
<html>
<head>
    <title>Piterson Costa Test</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
</head>
<body data-base-url="{{url('/')}}">
<div class="container-scroller" id="app">
    <h4 style="width: 100%; text-align: center">{{$name_report}}</h4>

    <table class="table table-bordered" style="width: 100%" border="1">
        <thead>
        <tr>
            <th> {{__('Provider')}} </th>
            <th> {{__('Start date')}} </th>
            <th> {{__('End date')}} </th>
            <th> {{__('Hours')}} </th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr style="text-align: center">
                <td>{{!empty($event->name) ? $event->name : $event->provider->name}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->end_date}}</td>
                <td>{{!empty($event->hours) ? intdiv($event->hours, 60).':'. ($event->hours % 60): intdiv($event->start_date->diffInMinutes($event->end_date), 60).':'. ($event->start_date->diffInMinutes($event->end_date) % 60)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
