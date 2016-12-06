app.factory('recursoServico', function ($http) {

    function getAll() {
        return $http({
            method: 'GET',
            url: api('recursos')
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