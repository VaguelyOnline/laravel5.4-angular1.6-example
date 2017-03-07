// create and register the car controller with the module
window.app.module.controller('CarCtrl', function($location, $routeParams, CarService) {

    // define a list of cars
    this.cars = CarService.getCars();

    this.addCar = function (newCar)
    {
        var car = angular.copy(newCar);
        CarService.addCar(car);
        newCar = {};
    };

    this.showCar = function (car)
    {
        // set the current location to match this car
        // see the route config
        $location.url( car.getUrl() );
    };

    this.showAll = function ()
    {
        $location.url('/');
    };

    this.getCars = function ()
    {
        return this.cars;
    };

    // IEFE init
    !(function init() {

        // indicate that we've been instantiated
        console.log('XXXX');


    })();
});
    