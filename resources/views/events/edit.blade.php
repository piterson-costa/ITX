
@extends('layout.master')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            {{__('Event')}}
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ $event === null ? route('events.store') : route('events.update', $event) }}">
                <div class="form-group">
                    @csrf
                    @if($event !== null)
                        <input name="_method" type="hidden" value="PUT">
                    @endif
                    <label for="provider_id">{{__("Provider")}}</label>
                    <select id="provider_id" name="provider_id" class="form-control col-md-6" style="padding: inherit">
                        <option value="">{{__("Selecione")}}</option>
                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}" {{old('provider_id', optional($event)->provider_id) === $provider->id ? 'selected="selected"' : ''}}>{{$provider->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">{{__("Start date")}}</label>
                    <input type="datetime-local" name="start_date" id="start_date" value="{{old('start_date', optional($event)->start_date)}}" class="form-control col-md-6"/>
                </div>
                <div class="form-group">
                    <label for="end_date">{{__("End date")}}</label>
                    <input type="datetime-local" name="end_date" id="end_date" value="{{old('end_date', optional(optional($event)->end_date)->format('d/m/Y H:i') )}}" class="form-control col-md-6"/>
                </div>

                <button type="submit" class="btn btn-block btn-success">{{__('save')}}</button>
            </form>
        </div>
    </div>
@endsection
