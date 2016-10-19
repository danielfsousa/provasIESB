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

        /******************
         *    Questões    *
         ******************/

        .when('/questao/criar/objetiva', {
            templateUrl: 'pages/questoes/criar/objetiva.html'
        })

        .when('/questao/criar/subjetiva', {
            templateUrl: 'pages/questoes/criar/subjetiva.html'
        })

        .when('/questao/:id', {
            templateUrl: 'pages/questoes/visualizar.html'
        })

        .when('/questoes', {
            templateUrl: 'pages/questoes/listar.html'
        })

        .when('/questoes/aguardando', {
            templateUrl: 'pages/questoes/listar.html'
        })

        .when('/questoes/aceitas', {
            templateUrl: 'pages/questoes/listar.html'
        })

        .when('/questoes/recusadas', {
            templateUrl: 'pages/questoes/listar.html'
        })

        .when('/questoes/rascunhos', {
            templateUrl: 'pages/questoes/listar.html'
        })

        /******************
         *     Provas     *
         ******************/

        .when('/provas', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/prova/:id', {
            templateUrl: 'pages/provas/visualizar.html'
        })

        .when('/provas/aguardando', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/provas/aceitas', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/provas/recusadas', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/provas/rascunhos', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/provas/imprimir', {
            templateUrl: 'pages/provas/listar.html'
        })

        .when('/provas/digitalizar', {
            templateUrl: 'pages/provas/listar.html'
        })

        /******************
         *     Notas      *
         ******************/

        .when('/notas', {
            templateUrl: 'pages/notas/listar.html'
        })

        .when('/notas/:disciplina', {
            templateUrl: 'pages/notas/listar.html'
        })

        /******************
         *    Recursos    *
         ******************/

        .when('/recursos', {
            templateUrl: 'pages/recursos/listar.html'
        })

        .when('/recurso/criar', {
            templateUrl: 'pages/recursos/criar.html'
        })

        .when('/recursos/aguardando', {
            templateUrl: 'pages/recursos/listar.html'
        })

        .when('/recursos/aceitos', {
            templateUrl: 'pages/recursos/listar.html'
        })

        .when('/recursos/recusados', {
            templateUrl: 'pages/recursos/listar.html'
        })

        .when('/recurso/:id', {
            templateUrl: 'pages/recursos/visualizar.html'
        })

        .otherwise({templateUrl: 'pages/404.html'});

    $locationProvider.html5Mode(true);
});