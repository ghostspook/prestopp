<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::orderBy('name')->get();

        return view('providers.index', [ 'providers' => $providers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('providers.create', [ 'cities' => $cities ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        Provider::create([
            'name' => $input["name"],
            'address' => $input["address"],
            'city_id' => $input["city_id"],
        ]);

        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $cities = City::all();

        return view('providers.edit', [
            'provider' => $provider,
            'cities' => $cities,
        ]);
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
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        $provider->name = $input['name'];
        $provider->address = $input['address'];
        $provider->city_id = $input['city_id'];
        $provider->save();

        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request, Provider $provider)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $input = $request->all();

        User::create([
            'name' => $provider->name,
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'provider_id' => $provider->id,
        ]);

        return redirect()->route('providers.edit', [ 'provider' => $provider]);
    }
}
