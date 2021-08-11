<!DOCTYPE html>
<html>
<head>
    <title>Piterson Costa Teste</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
</head>
<body data-base-url="{{url('/')}}">
<div class="receipt-main">
    <p class="receipt-title">{{__('Receipt')}}</p>
    <div class="receipt-section pull-left">
        <span class="receipt-label text-large">{{__('Provider')}}:</span>
        <span class="text-large">{{$provider->name}}</span>
    </div>
    <div class="receipt-section pull-left">
        <span class="receipt-label text-large">{{__('Provider')}} email:</span>
        <span class="text-large">{{$provider->email}}</span>
    </div>
    <div class="pull-right receipt-section">
        <span class="text-large receipt-label">{{__("Total hours")}}</span>
        <span class="text-large">{{$provider->total_hours}}</span>
    </div>
    <table class="table table-bordered" style="width: 100%; margin-top: 30px">
        <thead>
        <tr>
            <th> {{__('Start date')}} </th>
            <th> {{__('End date')}} </th>
            <th> {{__('Hours')}} </th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr style="text-align: center">
                <td>{{$event->start_date}}</td>
                <td>{{$event->end_date}}</td>
                <td>{{!empty($event->hours) ? intdiv($event->hours, 60).':'. ($event->hours % 60): intdiv($event->start_date->diffInMinutes($event->end_date), 60).':'. ($event->start_date->diffInMinutes($event->end_date) % 60)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="receipt-section" style="margin-top: 30px">
        <p>{{__('I received from ITX the receipt for the hours worked')}}</p>
    </div>
    <div class="receipt-signature col-xs-6" style="margin-top: 50px">
        <p class="receipt-line"></p>
        <p>{{$provider->name}}</p>
    </div>

    <div class="receipt-signature col-xs-6">
        <p class="receipt-line"></p>
        <p>ITX</p>
    </div>
</div>
<style>

    * {
        box-sizing: border-box;
    }

    .receipt-main {
        display: inline-block;
        width: 100%;
        padding: 15px;
        font-size: 12px;
        border: 1px solid #000;
    }

    .receipt-title {
        text-align: center;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 600;
        margin: 0;
    }

    .receipt-label {
        font-weight: 600;
    }

    .text-large {
        font-size: 16px;
    }

    .receipt-section {
        margin-top: 10px;
    }

    .receipt-footer {
        text-align: center;
        background: #ff0000;
    }

    .receipt-signature {
        height: 40px;
        margin: 20px 0;
        padding: 0 50px;
        background: #fff;
    }
    .receipt-line {
        margin-bottom: 10px;
        border-bottom: 1px solid #000;
    }

    p {
        text-align: center;
        margin: 0;
    }
</style>
</body>
</html>
