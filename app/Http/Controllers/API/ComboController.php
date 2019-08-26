<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Combo;
class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Combo::latest()->paginate(10);
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
        'combo_meal_name' => 'required|string|unique:combos',
        'status' => 'required|string',
        'price' => 'required',
       ]);

         return Combo::create([
        'combo_meal_name' => $request['combo_meal_name'],
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
         $combos = Combo::findOrFail($id);
        $this->validate($request,[
             'combo_meal_name' => 'string',
             'status' => 'string',
             'price' => 'required',
        ]);

        $combos->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combos = Combo::findOrFail($id);
        $combos->delete();

    }
}
