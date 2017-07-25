app.factory('api', function () {

    return function (url) {
        return 'http://localhost:8000/api/' + url;
    }

});