app.factory('notaServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('notas'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('notas/' + id)
        });
    }

    return {
        getAll: getAll,
        getById: getById
    }

});