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

    return {
        getAll: getAll,
        getById: getById
    }

});