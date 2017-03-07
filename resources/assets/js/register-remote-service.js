// Registers a service that will service as a clientside store of data held on the server.
// This avoids the need to always reload the data from the server unless you need to.
// Note - caching on the client is a good thing - but be aware of the possibility of stale data
// you may wish to eventually implement a 'do I have the latest data' mechanism.
window.app.module.service('CarService', function (Car) {

    // init the cars
    var cars = Car.query(function (response) {
    });

    // when initialised - read the data from the server
    this.getCars = function ()
    {
        return cars;
    };

    this.addCar = function (newCar)
    {
        var car = new Car(newCar);
        car.$save().then(function (car) {
            // the server has accepted our new car - push onto our local store
            // of cars!
            cars.push(car);
        });
    };
});