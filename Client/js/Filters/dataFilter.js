app.filter('data', function myDateFormat($filter) {
    return function (text) {
        if (text) {
            var tempdate = new Date(text.replace(/-/g, "/"));
            return $filter('date')(tempdate, "dd/MM/yyyy");
        }
    }
});