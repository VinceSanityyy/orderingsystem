<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Burger;
class BurgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
      
         return Burger::latest()->paginate(10);
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
        'burger_name' => 'required|string|unique:burgers',
        'status' => 'required|string',
        'price' => 'required',
       ]);

         return Burger::create([
        'burger_name' => $request['burger_name'],
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
        $burger = Burger::findOrFail($id);
        $this->validate($request,[
             'burger_name' => 'string',
             'status' => 'required|string',
             'price' => 'required',
        ]);

        $burger->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $burger = Burger::findOrFail($id);
        $burger->delete();

        return['message'=> 'Deleted'];
    }
}
