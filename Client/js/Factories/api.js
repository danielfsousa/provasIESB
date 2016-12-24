app.factory('api', function () {

    return function (url) {
        return 'http://52.39.66.114:8000/api/' + url;
    }

});