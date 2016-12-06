'use strict';

var app = angular.module('iesb', ['ngAnimate', 'toastr', 'ui.router', 'restangular', 'LocalStorageModule']);

app.config(function($httpProvider, $locationProvider, toastrConfig) {

    $locationProvider.html5Mode(true);
    $httpProvider.defaults.useXDomain = true;
    $httpProvider.interceptors.push('httpInterceptor');

    angular.extend(toastrConfig, {
        positionClass: 'toast-bottom-right'
    });

});

function api(url) {
    return 'http://localhost:8000/api/' + url;
}