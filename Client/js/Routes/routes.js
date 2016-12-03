'use strict';

app
    .config(function($stateProvider) {

        $stateProvider

            .state('template', {
                templateUrl: 'pages/template.html',
                controller: 'MainController',
                auth: true
            })

            .state('template.inicio', {
                url: '/',
                templateUrl: 'pages/inicio.html',
                auth: true
            })

            .state('login', {
                url: '/entrar',
                templateUrl: 'pages/login.html',
                controller: 'LoginController',
                auth: false
            })

            /******************
             *    Questões    *
             ******************/
            .state('template.listarQuestoes', {
                url: '/questoes',
                templateUrl: 'pages/questoes/listar.html',
                auth: true
            })

            .state('template.criarQuestaoObjetiva', {
                url: '/questoes/criar/objetiva',
                templateUrl: 'pages/questoes/criar/objetiva.html',
                auth: true
            })

            .state('template.criarQuestaoSubjetiva', {
                url: '/questoes/criar/subjetiva',
                templateUrl: 'pages/questoes/criar/subjetiva.html',
                auth: true
            })

            .state('template.questoesAguardando', {
                url: '/questoes/aguardando',
                templateUrl: 'pages/questoes/listar.html',
                auth: true
            })

            .state('template.questoesAceitas', {
                url: '/questoes/aceitas',
                templateUrl: 'pages/questoes/listar.html',
                auth: true
            })

            .state('template.questoesRecusadas', {
                url: '/questoes/recusadas',
                templateUrl: 'pages/questoes/listar.html',
                auth: true
            })

            .state('template.questoesRascunhos', {
                url: '/questoes/rascunhos',
                templateUrl: 'pages/questoes/listar.html',
                auth: true
            })

            .state('template.editarQuestoes', {
                // TODO: Redireciona para subjetiva ou objetiva de acordo com o tipo da questao
                url: '/questoes/:id/editar',
                templateUrl: 'pages/questoes/criar/subjetiva.html',
                auth: true
            })

            .state('template.editarSubjetiva', {
                url: '/questoes/:id/editar/subjetiva',
                templateUrl: 'pages/questoes/criar/subjetiva.html',
                auth: true
            })

            .state('template.editarObjetiva', {
                url: '/questoes/:id/editar/objetiva',
                templateUrl: 'pages/questoes/criar/objetiva.html',
                auth: true
            })

            .state('template.visualizarQuestao', {
                url: '/questoes/:id',
                templateUrl: 'pages/questoes/visualizar.html',
                auth: true
            })

            /******************
             *     Provas     *
             ******************/

            .state('template.listarProvas', {
                url: '/provas',
                templateUrl: 'pages/provas/listar.html',
                auth: true
            })

            .state('template.criarProvas', {
                url: '/provas/criar',
                templateUrl: 'pages/provas/criar.html',
                auth: true
            })

            .state('template.provasAguardando', {
                url: '/provas/aguardando',
                templateUrl: 'pages/provas/listar.html',
                auth: true
            })

            .state('template.provasAceitas', {
                url: '/provas/aceitas',
                templateUrl: 'pages/provas/listar.html',
                auth: true
            })

            .state('template.provasRecusadas', {
                url: '/provas/recusadas',
                templateUrl: 'pages/provas/listar.html',
                auth: true
            })

            .state('template.provasRascunho', {
                url: '/provas/rascunhos',
                templateUrl: 'pages/provas/listar.html',
                auth: true
            })

            .state('template.listarCorrecaoProvas', {
                url: '/provas/corrigir',
                templateUrl: 'pages/provas/corrigir/listar.html',
                auth: true
            })

            .state('template.corrigirProva', {
                url: '/provas/corrigir/:prova',
                templateUrl: 'pages/provas/corrigir/visualizar.html',
                auth: true
            })

            .state('template.digitalizarProva', {
                url: '/provas/digitalizar',
                templateUrl: 'pages/provas/digitalizar.html',
                auth: true
            })

            .state('template.visualizarProva', {
                url: '/provas/:id',
                templateUrl: 'pages/provas/visualizar.html',
                auth: true
            })

            .state('template.editarProva', {
                url: '/provas/:id/editar',
                templateUrl: 'pages/provas/criar.html',
                auth: true
            })

            /******************
             *     Notas      *
             ******************/

            .state('template.listarNotas', {
                url: '/notas',
                templateUrl: 'pages/notas/listar.html',
                auth: true
            })

            .state('template.notasAguardando', {
                url: '/notas/aguardando',
                templateUrl: 'pages/notas/listar.html',
                auth: true
            })

            .state('template.notasCorrigidas', {
                url: '/notas/corrigidas',
                templateUrl: 'pages/notas/listar.html',
                auth: true
            })

            .state('template.visualizarNotas', {
                url: '/notas/:prova',
                templateUrl: 'pages/notas/visualizar.html',
                auth: true
            })

            /******************
             *    Recursos    *
             ******************/

            .state('template.listarRecursos', {
                url: '/recursos',
                templateUrl: 'pages/recursos/listar.html',
                auth: true
            })

            .state('template.criarRecurso', {
                url: '/recursos/criar',
                templateUrl: 'pages/recursos/criar.html',
                auth: true
            })

            .state('template.recursosAguardando', {
                url: '/recursos/aguardando',
                templateUrl: 'pages/recursos/listar.html',
                auth: true
            })

            .state('template.recursosAceitos', {
                url: '/recursos/aceitos',
                templateUrl: 'pages/recursos/listar.html',
                auth: true
            })

            .state('template.recursosRecusados', {
                url: '/recursos/recusados',
                templateUrl: 'pages/recursos/listar.html',
                auth: true
            })

            .state('template.visualizarRecurso', {
                url: '/recursos/:id',
                templateUrl: 'pages/recursos/visualizar.html',
                auth: true
            })

            /******************
             *    404    *
             ******************/
            .state('template.404', {
                url: '*path',
                templateUrl: 'pages/404.html',
                auth: true
            });

    })

    .run(function($rootScope, $state, usuarioServico) {

        $rootScope.$on("$stateChangeStart", function(event, toState, toParams, fromState, fromParams){
            if (toState.auth && !usuarioServico.estaLogado()){
                $state.transitionTo('login');
                event.preventDefault();
            }
            else if (toState.name === 'login' && usuarioServico.estaLogado()) {
                $state.transitionTo('template.inicio');
                event.preventDefault();
            }
        });

        $rootScope.$on('$viewContentLoaded', function () {
            jQuery.AdminLTE.layout.activate();
        });
    });