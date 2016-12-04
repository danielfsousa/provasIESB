app.factory('httpRequestInterceptor', function ($injector) {
    return {
        request: function (config) {

            var usuarioServico = $injector.get('usuarioServico');

            config.headers['Authorization'] = 'Bearer ' + usuarioServico.getToken();
            config.headers['Accept'] = 'application/json;odata=verbose';

            return config;
        }
    };
});