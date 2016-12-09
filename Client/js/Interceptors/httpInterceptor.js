app.factory('httpInterceptor', function ($injector, $q) {

    return {
        request: function (config) {

            config.headers['Authorization'] = 'Bearer ' + $injector.get('usuarioServico').getToken();
            config.headers['Accept'] = 'application/json;odata=verbose';

            return config || $q.when(config);
        },
        responseError: function(rejection) {

            if (rejection.data.error === 'token_expired') {
                $injector.get('usuarioServico').logout();
                $injector.get('$state').go('login');
                $injector.get('toastr').warning('Sua sessão expirou. Faça o login novamente.');
            }

            return $q.reject(rejection);
        }
    };

});