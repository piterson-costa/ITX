@extends('layout.master')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            {{__('Provider')}}
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

            <form method="post" action="{{ $provider === null ? route('providers.store') : route('providers.update', [ 'provider' => $provider ]) }}">
                <div class="form-group">
                    @csrf
                    @if($provider !== null)
                        <input name="_method" type="hidden" value="PUT">
                    @endif
                    <label for="name">{{__('Name')}}</label>
                    <input name="name" id="name" type="text" value="{{old('name', optional($provider)->name)}}" class="form-control col-md-6"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" value="{{old('email', optional($provider)->email)}}" class="form-control col-md-6"/>
                </div>

                <button type="submit" class="btn btn-block btn-success">{{__('Save')}}</button>
            </form>
        </div>
    </div>
@endsection
