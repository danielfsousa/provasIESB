app.factory('disciplinaServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('disciplinas'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('disciplinas/' + id)
        });
    }

    return {
        getAll: getAll,
        getById: getById
    }

});