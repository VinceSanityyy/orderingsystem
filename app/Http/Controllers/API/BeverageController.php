<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beverage;

class BeverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Beverage::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'beverage_name' => 'required|string|unique:beverages',
        'status' => 'required|string',
        'price' => 'required',
       ]);

         return Beverage::create([
        'beverage_name' => $request['beverage_name'],
        'status' => $request['status'],
        'price' => $request['price'],
      
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $beverage = Beverage::findOrFail($id);
        $this->validate($request, [
        'beverage_name' => 'string',
        'status' => 'string',
        'price' => 'required',
       ]);

        $beverage->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $beverage = Beverage::findOrFail($id);
             $beverage->delete();

             return['message'=> 'Deleted'];
    }
}
