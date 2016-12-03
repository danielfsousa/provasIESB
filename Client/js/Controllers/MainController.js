'use strict';

app.controller('MainController', function($scope, $state, usuarioServico) {

    usuarioServico.getUsuario(function (usuario) {
        $scope.usuario = usuario;
    }, function (response) {
        alert('Erro ao obter usuário');
    });

    $scope.logout = function () {
        usuarioServico.logout();
        $state.transitionTo('login');
    };
    
    $scope.estaAtivo = function (nome) {
        console.log($state.current.name);
        return ($state.current.name.toLowerCase().indexOf(nome) > -1) ? 'active' : '';
    }

});