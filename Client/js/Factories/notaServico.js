app.factory('notaServico', function ($http) {

    function getAll() {
        return $http({
            method: 'GET',
            url: api('notas')
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