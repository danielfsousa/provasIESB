app.factory('questaoServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('questoes'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('questoes/' + id)
        });
    }

    function aprovar(id) {
        return $http({
            method: 'GET',
            url: api('questoes/' + id + '/aprovar')
        });
    }

    function recusar(id) {
        return $http({
            method: 'GET',
            url: api('questoes/' + id + '/recusar')
        });
    }

    return {
        getAll: getAll,
        getById: getById,
        aprovar: aprovar,
        recusar: recusar
    }
    
});