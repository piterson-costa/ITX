
@extends('layout.master')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            {{__('Analytical')}}
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
            <form method="post" action="{{route('reports.getreports.analytical')}}">
                <div class="form-group col-md-6">
                    @csrf
                    <label for="provider_id">{{__("Provider")}}</label>
                    <select id="provider_id" name="provider_id" class="form-control" style="padding: inherit!important;">
                        <option value="">{{__("Selecione")}}</option>
                        <option value="-1">{{__("All")}}</option>
                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}" {{old('provider_id') === $provider->id ? 'selected="selected"' : ''}}>{{$provider->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="start_date">{{__("Start date")}}</label>
                    <input type="datetime-local" name="start_date" id="start_date" value="{{old('start_date')}}" class="form-control"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">{{__("End date")}}</label>
                    <input type="datetime-local" name="end_date" id="end_date" value="{{old('end_date')}}" class="form-control"/>
                </div>

                <button type="submit" class="btn btn-block btn-success">{{__('Export')}}</button>
            </form>
        </div>
    </div>
@endsection


