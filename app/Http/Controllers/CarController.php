<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    private static $INDEX = 0;

    private static $CARS = 
    [
        [
            "id" => static::$INDEX++,
            "title" => "Alpha"
        ],
        [
            "id" => static::$INDEX++,
            "title" => "BMW"
        ],
        [
            "id" => static::$INDEX++,
            "title" => "Corvette"
        ]
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return static::$CARS;
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
        $newCar = [
            'title' => $request->get('title'),
            'id' => static::$INDEX++
        ];

        static::$CARS[] = $newCar;
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
        //
    }
}
