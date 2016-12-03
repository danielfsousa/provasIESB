app.directive('select2', function () {
    return {
        restrict: 'A',
        link: function (scope, elem, attrs) {
            angular.element(elem).select2({
                language: "pt-BR"
            });
        }
    };
});