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

    return {
        getAll: getAll,
        getById: getById
    }

});