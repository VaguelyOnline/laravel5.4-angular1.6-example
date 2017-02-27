// place the angular module under the global namespace
window.app = window.app || {};

// create the module
window.app.module = angular
    .module('showroowApp', [require('angular-route')])
    .config(function ($interpolateProvider) {

        $interpolateProvider
            .startSymbol('{[{')
            .endSymbol('}]}');

    })
    .config(['$routeProvider', function ($routeProvider) {
        
        var carControllerParams = 
        {
            controller: 'CarCtrl',
            controllerAs: 'controller'
        };

        // configure the application routes...
        $routeProvider
            .when('/',          { redirectTo: '/cars' })
            .when('/cars',      angular.extend(carControllerParams, { templateUrl: '/partials/car/index.html' }))
            .when('/car/:id',   angular.extend(carControllerParams, { templateUrl: '/partials/car/show.html'  }));
    }]);