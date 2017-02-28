// register the model factories
window.app.module.factory('Car', function CarFactory ($resource) {
    // create the car as a resource - a model that is backed by a data service
    var Car = $resource('/api/v1/car:id', {
        // define the request params -> model props mappings
        id: '@id'
    }, {
        // optional:
        // now define any additional custom actions (methods that will trigger network operations)
        // this one is defined as an example - see CarController.php@update
        upgrade: {
            method: 'POST',
            url: 'api/v1/car:id/upgrade',
        }
    });

    // now customise the model with over model methods
    Car.prototype.getUrl = function ()
    {
        return '/car/' + this.id;
    };

    return Car;
});