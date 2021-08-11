@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0">{{__('Dashboard of events')}}</h4>
                </div>
                <div class="card-body">
                    <canvas id="mixed-chart" height="100"></canvas>
                    <div class="mr-5" id="mixed-chart-legend"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $keys = array_keys($coluns);
    $_labels = array();
    foreach ($keys as $key){
        $_labels[] = "'".$key."'";
    }
@endphp

<script>var valores_coluns = [{{implode(',', $coluns)}}]</script>
<script>var valores_line = [{{implode(',', $lines)}}]</script>
<script>var labels = [{!! implode(',', $_labels) !!}]</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}" ></script>
<script src="{{ asset('assets/js/chart.js') }}" ></script>

