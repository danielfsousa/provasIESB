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

    return {
        getAll: getAll,
        getById: getById
    }
    
});