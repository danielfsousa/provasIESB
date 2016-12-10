app.factory('turmaServico', function ($http, api) {

    function getAll(params) {
        return $http({
            method: 'GET',
            url: api('turmas'),
            params: params
        });
    }

    function getById(id) {
        return $http({
            method: 'GET',
            url: api('turmas/' + id)
        });
    }

    return {
        getAll: getAll,
        getById: getById
    }

});