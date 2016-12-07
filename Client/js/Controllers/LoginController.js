'use strict';

app.controller('LoginController', function ($scope, $http, $state, usuarioServico, toastr) {

        $scope.login = function() {
            usuarioServico.login(parseInt($scope.matricula), $scope.senha,
                function(response) {
                    $state.transitionTo('template.inicio');
                    toastr.clear();
                }, function(response) {
                    if (response.status === 401) {
                        toastr.error('A matrícula e/ou senha estão incorretos', 'ERRO');
                    } else {
                        toastr.error('Erro ao tentar se comunicar com o servidor', 'ERRO');
                    }

                }
            );
        };

        $scope.matricula = '';
        $scope.senha = '';

});