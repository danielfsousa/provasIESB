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

    function criar(recurso) {
        return $http({
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
            method: 'POST',
            url: api('recursos'),
            data: $.param(recurso)
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
        criar: criar,
        excluir: excluir
    }

});