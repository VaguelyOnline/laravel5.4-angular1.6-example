<?php

namespace App\Http;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


// A simple repository for managing Cars in lieu of a DB
class CarRepository
{
    private static $CARS = null;

    public static function getCars()
    {
        return array_values(Cache::remember('cars', 20, function () {
            return static::initCars();
        }));
    }

    private static function setCars($cars)
    {
        Cache::put('cars', $cars, 20);
    }

    public static function addCar($params)
    {
        $newCar = 
        [
            'id' => static::getNextIndex(),
            'title' => $params['title']
        ];

        $cars = static::getCars();
        $cars[] = $newCar;
        static::setCars($cars);

        return $newCar;
    }

    public static function getCar($id)
    {
        foreach (static::getCars() as $car)
            if ($car['id'] == $id)
                return $car;

        return null;
    }

    public static function removeCar($id)
    {
        $car = static::getCar($id);

        // update the cars array
        $cars = array_filter(static::getCars(), function ($car) use ($id) {
            return $car['id'] != $id;
        });

        static::setCars($cars);

        return $car;
    }

    private static function getNextIndex()
    {
        return Cache::increment('index');
    }

    private static function initCars()
    {
        $index = Cache::put('index', 0, 20);
        return 
        [
            [
                'id' => static::getNextIndex(),
                'title' => 'Alpha'
            ],
            [
                'id' => static::getNextIndex(),
                'title' => 'BMW'
            ],
            [
                'id' => static::getNextIndex(),
                'title' => 'Corvette'
            ]
        ];
    }
}