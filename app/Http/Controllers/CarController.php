<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\CarRepository;

class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarRepository::getCars();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->only('title');
        return CarRepository::addCar($params);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = CarRepository::getCar($id);
        return $this->paramOrNotFoundResponse($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = CarRepository::removeCar($id);
        return $this->paramOrNotFoundResponse($car);
    }

    // returns either the $param given, or if that is null, 
    // it returns a suitable, and always consistent not found
    // response
    private function paramOrNotFoundResponse($param)
    {
        return $param
            ? $param
            : response()->json(['message'=> 'Not found']);
    }
}
