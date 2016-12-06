app.factory('provaServico', function ($http) {

    function getAll() {
        return $http({
            method: 'GET',
            url: api('provas')
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