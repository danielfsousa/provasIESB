var app = angular.module('iesb', ['ngRoute']);
app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'pages/inicio.html'
        })
});