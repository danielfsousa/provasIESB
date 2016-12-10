app.factory('provaServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('provas'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('provas/' + id)
        });
    }

    function aprovar(id) {
        return $http({
            method: 'GET',
            url: api('provas/' + id + '/aprovar')
        });
    }

    function recusar(id) {
        return $http({
            method: 'GET',
            url: api('provas/' + id + '/recusar')
        });
    }

    function excluir(id) {
        return $http({
            method: 'DELETE',
            url: api('provas/' + id)
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