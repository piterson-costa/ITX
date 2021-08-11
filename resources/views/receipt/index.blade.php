
@extends('layout.master')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            {{__('Receipt')}}
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
            <form method="post" action="{{route('receipt.getreceipt')}}">
                <div class="form-group col-md-6">
                    @csrf
                    <label for="provider_id">{{__("Provider")}}</label>
                    <select id="provider_id" name="provider_id" class="form-control" style="padding: inherit!important;">
                        <option value="">{{__("Selecione")}}</option>
                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}" {{old('provider_id') === $provider->id ? 'selected="selected"' : ''}}>{{$provider->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-block btn-success">{{__('Export')}}</button>
            </form>
        </div>
    </div>
@endsection


