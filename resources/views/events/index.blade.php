@extends('layout.master')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            {{__('Events')}}
        </div>
        <div class="card">
            <div class="card-body">
                <div class="" style="float: right; margin-bottom: 10px">
                    <a href="{{route("events.create")}}" class="btn btn-success btn-md">{{__('New')}}</a>
                </div>
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> {{__('Provider')}} </th>
                            <th> {{__('Start date')}} </th>
                            <th> {{__('End date')}} </th>
                            <th> {{__('Total')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->provider->name}}</td>
                                <td>{{$event->start_date}}</td>
                                <td>{{$event->end_date}}</td>
                                <td class="text-center">
                                    <a href="{{ route('events.edit', $event)}}" class="btn btn-success btn-sm">Edit</a>

                                    <form action="{{ route('events.destroy', $event->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
