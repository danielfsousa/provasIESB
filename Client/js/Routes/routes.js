'use strict';

// app.config(function ($routeProvider, $locationProvider) {
//     $routeProvider
//
//         .when('/', {
//             templateUrl: 'pages/inicio.html'
//         })
//
//         // TODO
//         // Mudar o route do angular para o UI-Router ou usar ng-include na página de login
//         .when('/entrar', {
//             templateUrl: 'pages/login.html'
//         })
//
//         /******************
//          *    Questões    *
//          ******************/
//
//         .when('/questoes', {
//             templateUrl: 'pages/questoes/listar.html'
//         })
//
//         .when('/questoes/criar/objetiva', {
//             templateUrl: 'pages/questoes/criar/objetiva.html'
//         })
//
//         .when('/questoes/criar/subjetiva', {
//             templateUrl: 'pages/questoes/criar/subjetiva.html'
//         })
//
//         .when('/questoes/aguardando', {
//             templateUrl: 'pages/questoes/listar.html'
//         })
//
//         .when('/questoes/aceitas', {
//             templateUrl: 'pages/questoes/listar.html'
//         })
//
//         .when('/questoes/recusadas', {
//             templateUrl: 'pages/questoes/listar.html'
//         })
//
//         .when('/questoes/rascunhos', {
//             templateUrl: 'pages/questoes/listar.html'
//         })
//
//         .when('/questoes/:id/editar', {
//             // TODO: Redireciona para subjetiva ou objetiva de acordo com o tipo da questao
//             templateUrl: 'pages/questoes/criar/subjetiva.html'
//         })
//
//         .when('/questoes/:id/editar/subjetiva', {
//             templateUrl: 'pages/questoes/criar/subjetiva.html'
//         })
//
//         .when('/questoes/:id/editar/objetiva', {
//             templateUrl: 'pages/questoes/criar/objetiva.html'
//         })
//
//         .when('/questoes/:id', {
//             templateUrl: 'pages/questoes/visualizar.html'
//         })
//
//         /******************
//          *     Provas     *
//          ******************/
//
//         .when('/provas', {
//             templateUrl: 'pages/provas/listar.html'
//         })
//
//         .when('/provas/criar', {
//             templateUrl: 'pages/provas/criar.html'
//         })
//
//         .when('/provas/aguardando', {
//             templateUrl: 'pages/provas/listar.html'
//         })
//
//         .when('/provas/aceitas', {
//             templateUrl: 'pages/provas/listar.html'
//         })
//
//         .when('/provas/recusadas', {
//             templateUrl: 'pages/provas/listar.html'
//         })
//
//         .when('/provas/rascunhos', {
//             templateUrl: 'pages/provas/listar.html'
//         })
//
//         .when('/provas/corrigir', {
//             templateUrl: 'pages/provas/corrigir/listar.html'
//         })
//
//         .when('/provas/corrigir/:prova', {
//             templateUrl: 'pages/provas/corrigir/visualizar.html'
//         })
//
//         .when('/provas/digitalizar', {
//             templateUrl: 'pages/provas/digitalizar.html'
//         })
//
//         .when('/provas/:id', {
//             templateUrl: 'pages/provas/visualizar.html'
//         })
//
//         .when('/provas/:id/editar', {
//             templateUrl: 'pages/provas/criar.html'
//         })
//
//         /******************
//          *     Notas      *
//          ******************/
//
//         .when('/notas', {
//             templateUrl: 'pages/notas/listar.html'
//         })
//
//         .when('/notas/aguardando', {
//             templateUrl: 'pages/notas/listar.html'
//         })
//
//         .when('/notas/corrigidas', {
//             templateUrl: 'pages/notas/listar.html'
//         })
//
//         .when('/notas/:prova', {
//             templateUrl: 'pages/notas/visualizar.html'
//         })
//
//         /******************
//          *    Recursos    *
//          ******************/
//
//         .when('/recursos', {
//             templateUrl: 'pages/recursos/listar.html'
//         })
//
//         .when('/recursos/criar', {
//             templateUrl: 'pages/recursos/criar.html'
//         })
//
//         .when('/recursos/aguardando', {
//             templateUrl: 'pages/recursos/listar.html'
//         })
//
//         .when('/recursos/aceitos', {
//             templateUrl: 'pages/recursos/listar.html'
//         })
//
//         .when('/recursos/recusados', {
//             templateUrl: 'pages/recursos/listar.html'
//         })
//
//         .when('/recursos/:id', {
//             templateUrl: 'pages/recursos/visualizar.html'
//         })
//
//         .otherwise({templateUrl: 'pages/404.html'});
//
//     $locationProvider.html5Mode(true);
// });

app
    .config(function($stateProvider, $urlRouterProvider, $locationProvider) {

    $locationProvider.html5Mode(true);
    // $urlRouterProvider.otherwise('template.404');

    $stateProvider

        .state('template', {
            templateUrl: 'pages/template.html'
        })

        .state('template.inicio', {
            url: '/',
            templateUrl: 'pages/inicio.html'
        })

        .state('login', {
            url: '/login',
            templateUrl: 'pages/login.html'
        })

        .state('template.404', {
            url: '*path',
            templateUrl: 'pages/404.html'
        });
    })

    .run(function($rootScope) {
        $rootScope.$on('$viewContentLoaded', function () {
            jQuery.AdminLTE.layout.activate();
        });
    });