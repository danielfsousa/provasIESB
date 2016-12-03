'use strict';

var app = angular.module('iesb', ['ngAnimate', 'toastr', 'ui.router', 'restangular', 'LocalStorageModule']);

app.config(function($httpProvider, $locationProvider) {

    $locationProvider.html5Mode(true);
    $httpProvider.defaults.useXDomain = true;

});

function api(url) {
    return 'http://localhost:8000/api/' + url;
}