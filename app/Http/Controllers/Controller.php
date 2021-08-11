<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Provider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use PDF;
use DateTime;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $providers = Provider::all();
        $coluns = array();
        $line = array();

        foreach ($providers as $provider){
            $coluns[$provider->name] = 0;
            foreach ($provider->events as $event){
                $coluns[$provider->name] += $event->start_date->diffInMinutes($event->end_date);
            }
        }

        foreach ($coluns as $key => $colun){
            $line[$key] = intdiv($colun, 60)/count($providers);
            $coluns[$key] = intdiv($colun, 60);
        }

        return view("dashboard", array('coluns' => $coluns, 'lines' => $line));
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receipt()
    {
        $providers = Provider::all(['id', 'name']);
        return view("receipt.index", array("providers" => $providers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReceipt(Request $request)
    {
        $request->validate([
            'provider_id' => 'required',
        ]);
        $provider = Provider::where('id', $request->provider_id)->first();;
        $events = Event::where('provider_id', $request->provider_id)->get();
        $diff = 0;
        foreach ($events as $event) {
            $diff += $event->start_date->diffInMinutes($event->end_date);
        }
        $provider->total_hours = intdiv($diff, 60).':'. ($diff % 60);
        $_pdf = PDF::loadView("receipt.receipt_template", array("events" => $events, "provider" => $provider));
        return $_pdf->setPaper('a5')->download('receipt_template');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function analytical()
    {
        $providers = Provider::all(['id', 'name']);
        return view("reports.analytical", array("providers" => $providers));
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function synthetic()
    {
        $providers = Provider::all(['id', 'name']);
        return view("reports.synthetic", array("providers" => $providers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReportsAnalytical(Request $request)
    {
        $events = $this->getEventsProviders($request);
        $_pdf = PDF::loadView("reports.report_template", array("events" => $events, 'name_report' => __("Analytical")));
        return $_pdf->setPaper('a4')->download('report_template');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReportsSynthetic(Request $request)
    {
        $events = $this->getEventsProviders($request);
        $response = array();
        $diff = 0;
        if($request->provider_id > 0){
            foreach ($events as $event) {
                if(empty($response[$event->provide_id])){
                    $response[$event->provide_id] = $event;
                    $response[$event->provide_id]['name'] = $event->provider->name;
                    $response[$event->provide_id]['start_date'] = $request->start_date;
                    $response[$event->provide_id]['end_date'] = $request->end_date;
                }
                $response[$event->provide_id]['hours'] += $event->start_date->diffInMinutes($event->end_date);
            }
        } else {
            foreach ($events as $event) {
                if(empty($response))
                    $response[0] = $event;
                $diff += $event->start_date->diffInMinutes($event->end_date);
            }
            if($diff){
                $response[0]['name'] = __("all");
                $response[0]['provide_id'] = $request->provide_id;
                $response[0]['start_date'] = $request->start_date;
                $response[0]['end_date'] = $request->end_date;
                $response[0]['hours'] = $diff;
            }

        }
        $_pdf = PDF::loadView("reports.report_template", array('events'=> $response, 'name_report' => __("Synthetic")));
        return $_pdf->setPaper('a4')->download('report_template');
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     *
     */
    public function getEventsProviders($request)
    {
        $request->validate([
            'provider_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);
        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
        if ($request->provider_id > 0){
            $events = Event::where('provider_id', $request->provider_id)
                ->whereBetween('start_date', [$start_date, $end_date])
                ->whereBetween('end_date', [$start_date, $end_date])
                ->get();
        }else{
            $events = Event::whereBetween('start_date', [$start_date, $end_date])
                ->whereBetween('end_date', [$start_date, $end_date])
                ->get();
        }
        return $events;
    }

}
