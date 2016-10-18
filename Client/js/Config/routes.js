app.config(function ($routeProvider, $locationProvider) {
    $routeProvider

        .when('/', {
            templateUrl: 'pages/inicio.html'
        })

        // TODO
        // Mudar o route do angular para o UI-Router ou usar ng-include na página de login
        .when('/login', {
            templateUrl: 'pages/login.html'
        })

        .when('/questoes', {
            templateUrl: 'pages/questoes/listar.html'
        })

        .when('/provas', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/notas', {
            templateUrl: 'pages/notas/listar.html'
        })

        .when('/recursos', {
            templateUrl: 'pages/recursos/listar.html'
        })

        .otherwise({templateUrl: 'pages/404.html'});

    $locationProvider.html5Mode(true);
});