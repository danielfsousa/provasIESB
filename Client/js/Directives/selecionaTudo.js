app.directive('selecionaTudo', function () {
    return {
        restrict: 'A',
        link: function (scope, elem, attrs) {
            angular.element(elem).focus(function() {
                angular.element(this).select();
            });
        }
    };
});