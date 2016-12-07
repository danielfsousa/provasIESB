'use strict';

var app = angular.module('iesb', ['ngAnimate', 'toastr', 'ui.router', 'LocalStorageModule', 'datatables']);

app.config(function($httpProvider, $locationProvider, toastrConfig) {

    $locationProvider.html5Mode(true);
    $httpProvider.defaults.useXDomain = true;
    $httpProvider.interceptors.push('httpInterceptor');

    angular.extend(toastrConfig, {
        positionClass: 'toast-bottom-right'
    });

});