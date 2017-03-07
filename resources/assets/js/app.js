
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// init angular
require('./configure-angular');

// register the model factories (Model classes)
require('./register-model-factories');

// register the service that will function as a client-side cache
require('./register-remote-service');

// now load / register the showroom controller
require('./car-controller');