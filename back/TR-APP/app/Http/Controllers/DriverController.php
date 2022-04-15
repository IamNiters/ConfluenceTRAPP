<?php

namespace App\Http\Controllers;
use App\Models\Driver;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Driver::all();
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
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'matricule' => 'required',
            'conges' => 'required',
        ]);
        return Driver::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Driver::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::find($id);
        $driver->update($request->all());
        return $driver;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Driver::destroy($id);
        //or
        /* $driver = Driver::find($id);
        $driver->delete();
        return $driver; */
    }
    /**
     * search for  the a nom
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nom)
    {
        return Driver::where('nom', 'like', '%' . $nom . '%')->get();
       
    }
}
