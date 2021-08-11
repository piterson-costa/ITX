@extends('layout.master')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            {{__('Providers')}}
        </div>
        <div class="card-body">
            <div class="" style="float: right; margin-bottom: 10px">
                <a href="{{route("providers.create")}}" class="btn btn-success btn-md">{{__('New')}}</a>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> {{__('Name')}} </th>
                        <th> {{__('Email')}} </th>
                        <th> {{__('Action')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($providers as $provider)
                        <tr>
                            <td>{{$provider->id}}</td>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->email}}</td>
                            <td class="text-center">
                                <a href="{{ route('providers.edit', $provider->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('providers.destroy', $provider->id)}}" method="post" style="display: inline-block">
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
@endsection
