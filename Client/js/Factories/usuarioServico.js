'use strict';

app.factory('usuarioServico', ['$http', 'localStorageService', 'api', function ($http, localStorageService, api) {

    function estaLogado() {
        if (localStorageService.get('token')) {
            return true;
        } else {
            return false;
        }
    }

    function login(matricula, senha, onSuccess, onError) {
        $http({
            method: 'POST',
            url: api('autenticar'),
            data: $.param({matricula: matricula, senha: senha}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        })
            .then(function (response) {
                localStorageService.set('token', response.data.token);
                getUsuario();
                onSuccess(response);
            }, function (response) {
                onError(response);
            });
    }

    function logout() {
        localStorageService.remove('token');
        localStorageService.remove('usuario');
    }

    function getUsuario(onSuccess, onError) {

        var usuario = localStorageService.get('usuario');
        if (usuario) {
            typeof onSuccess == "function" && onSuccess(usuario);
            return usuario;
        }

        $http({
            method: 'GET',
            url: api('usuario'),
            headers: { 'Authorization': 'Bearer ' + getToken() }
        })
            .then(function (response) {
                localStorageService.set('usuario', response.data);
                typeof onSuccess == "function" && onSuccess(response.data);
            }, function (response) {
                typeof onError == "function" && onError(response);
            });
    }

    function getToken() {
        return localStorageService.get('token');
    }

    return {
        estaLogado: estaLogado,
        login: login,
        logout: logout,
        getUsuario: getUsuario,
        getToken: getToken
    }

}]);