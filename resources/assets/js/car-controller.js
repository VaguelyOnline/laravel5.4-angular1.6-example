// create and register the car controller with the module
window.app.module.controller('CarCtrl', function($http, $location, $routeParams) {
    
    // define a list of cars
    this.cars = [];

    this.addCar = function (newCar)
    {
        var car = angular.copy(newCar);
        this.cars.push(car);
    };

    this.showCar = function (car)
    {
        $location.url('/car/123');
    };

    this.showAll = function ()
    {
        $location.url('/');
    }

    // IEFE init
    !(function init() {

        // indicate that we've been instantiated
        console.log('XXXX');


    })();
});
    