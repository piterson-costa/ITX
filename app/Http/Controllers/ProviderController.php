<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Provider;
use App\Models\Event;
use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;
use PDF;
use DateTime;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view("provider.index", compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("provider.edit", array("provider" => null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        Provider::create($storeData);

        return redirect()->route('providers.index')->with('completed', 'Employee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view("provider.index", array("provider" => $provider));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {

        return view("provider.edit", array("provider" => $provider));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $provider->update($data);
        return redirect()->route('providers.index')->with('completed', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($provider)
    {
        $provider = Provider::findOrFail($provider);
        $provider->delete();

        return redirect('/providers')->with('completed', 'provider deleted');
    }
}
