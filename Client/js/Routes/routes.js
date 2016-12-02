'use strict';

app
    .config(function($stateProvider, $urlRouterProvider, $locationProvider) {

        $locationProvider.html5Mode(true);

        $stateProvider

            .state('template', {
                templateUrl: 'pages/template.html'
            })

            .state('template.inicio', {
                url: '/',
                templateUrl: 'pages/inicio.html'
            })

            .state('login', {
                url: '/entrar',
                templateUrl: 'pages/login.html'
            })

            /******************
             *    Questões    *
             ******************/
            .state('template.listarQuestoes', {
                url: '/questoes',
                templateUrl: 'pages/questoes/listar.html'
            })

            .state('template.criarObjetiva', {
                url: '/questoes/criar/objetiva',
                templateUrl: 'pages/questoes/criar/objetiva.html'
            })

            .state('template.criarSubjetiva', {
                url: '/questoes/criar/subjetiva',
                templateUrl: 'pages/questoes/criar/subjetiva.html'
            })

            .state('template.questoesAguardando', {
                url: '/questoes/aguardando',
                templateUrl: 'pages/questoes/listar.html'
            })

            .state('template.questoesAceitas', {
                url: '/questoes/aceitas',
                templateUrl: 'pages/questoes/listar.html'
            })

            .state('template.questoesRecusadas', {
                url: '/questoes/recusadas',
                templateUrl: 'pages/questoes/listar.html'
            })

            .state('template.questoesRascunhos', {
                url: '/questoes/rascunhos',
                templateUrl: 'pages/questoes/listar.html'
            })

            .state('template.editarQuestoes', {
                // TODO: Redireciona para subjetiva ou objetiva de acordo com o tipo da questao
                url: '/questoes/:id/editar',
                templateUrl: 'pages/questoes/criar/subjetiva.html'
            })

            .state('template.editarSubjetiva', {
                url: '/questoes/:id/editar/subjetiva',
                templateUrl: 'pages/questoes/criar/subjetiva.html'
            })

            .state('template.editarObjetiva', {
                url: '/questoes/:id/editar/objetiva',
                templateUrl: 'pages/questoes/criar/objetiva.html'
            })

            .state('template.visualizarQuestao', {
                url: '/questoes/:id',
                templateUrl: 'pages/questoes/visualizar.html'
            })

            /******************
             *     Provas     *
             ******************/

            .state('template.listarProvas', {
                url: '/provas',
                templateUrl: 'pages/provas/listar.html'
            })

            .state('template.criarProvas', {
                url: '/provas/criar',
                templateUrl: 'pages/provas/criar.html'
            })

            .state('template.provasAguardando', {
                url: '/provas/aguardando',
                templateUrl: 'pages/provas/listar.html'
            })

            .state('template.provasAceitas', {
                url: '/provas/aceitas',
                templateUrl: 'pages/provas/listar.html'
            })

            .state('template.provasRecusadas', {
                url: '/provas/recusadas',
                templateUrl: 'pages/provas/listar.html'
            })

            .state('template.provasRascunho', {
                url: '/provas/rascunhos',
                templateUrl: 'pages/provas/listar.html'
            })

            .state('template.listarCorrecaoProvas', {
                url: '/provas/corrigir',
                templateUrl: 'pages/provas/corrigir/listar.html'
            })

            .state('template.corrigirProva', {
                url: '/provas/corrigir/:prova',
                templateUrl: 'pages/provas/corrigir/visualizar.html'
            })

            .state('template.digitalizarProva', {
                url: '/provas/digitalizar',
                templateUrl: 'pages/provas/digitalizar.html'
            })

            .state('template.visualizarProva', {
                url: '/provas/:id',
                templateUrl: 'pages/provas/visualizar.html'
            })

            .state('template.editarProva', {
                url: '/provas/:id/editar',
                templateUrl: 'pages/provas/criar.html'
            })

            /******************
             *     Notas      *
             ******************/

            .state('template.listarNotas', {
                url: '/notas',
                templateUrl: 'pages/notas/listar.html'
            })

            .state('template.notasAguardando', {
                url: '/notas/aguardando',
                templateUrl: 'pages/notas/listar.html'
            })

            .state('template.notasCorrigidas', {
                url: '/notas/corrigidas',
                templateUrl: 'pages/notas/listar.html'
            })

            .state('template.visualizarNotas', {
                url: '/notas/:prova',
                templateUrl: 'pages/notas/visualizar.html'
            })

            /******************
             *    Recursos    *
             ******************/

            .state('template.listarRecursos', {
                url: '/recursos',
                templateUrl: 'pages/recursos/listar.html'
            })

            .state('template.criarRecurso', {
                url: '/recursos/criar',
                templateUrl: 'pages/recursos/criar.html'
            })

            .state('template.recursosAguardando', {
                url: '/recursos/aguardando',
                templateUrl: 'pages/recursos/listar.html'
            })

            .state('template.recursosAceitos', {
                url: '/recursos/aceitos',
                templateUrl: 'pages/recursos/listar.html'
            })

            .state('template.recursosRecusados', {
                url: '/recursos/recusados',
                templateUrl: 'pages/recursos/listar.html'
            })

            .state('template.visualizarRecurso', {
                url: '/recursos/:id',
                templateUrl: 'pages/recursos/visualizar.html'
            })

            /******************
             *    404    *
             ******************/
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