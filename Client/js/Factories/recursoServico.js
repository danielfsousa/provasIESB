app.factory('recursoServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('recursos'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('recursos/' + id)
        });
    }

    function aprovar(id) {
        return $http({
            method: 'GET',
            url: api('recursos/' + id + '/aprovar')
        });
    }

    function recusar(id) {
        return $http({
            method: 'GET',
            url: api('recursos/' + id + '/recusar')
        });
    }

    function excluir(id) {
        return $http({
            method: 'DELETE',
            url: api('recursos/' + id)
        });
    }

    return {
        getAll: getAll,
        getById: getById,
        aprovar: aprovar,
        recusar: recusar,
        excluir: excluir
    }

});