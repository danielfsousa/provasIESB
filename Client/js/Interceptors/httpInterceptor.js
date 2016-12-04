app.factory('httpRequestInterceptor', function ($injector, $q, $state) {
    return {
        request: function (config) {

            var usuarioServico = $injector.get('usuarioServico');

            config.headers['Authorization'] = 'Bearer ' + usuarioServico.getToken();
            config.headers['Accept'] = 'application/json;odata=verbose';

            return config || $q.when(config);
        },
        response: function (response) {
            if (response.status === 401) {
                $state.go('login');
            }

            return response || $q.when(response);
        }
    };
});