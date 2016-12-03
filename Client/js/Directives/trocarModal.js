app.directive('trocarModal', function () {
    return {
        restrict: 'A',
        link: function (scope, elem, attrs) {
            angular.element(elem).on('click', function (e) {
                setTimeout(function () {
                    console.log('olaa');
                    var id = angular.element(e.target).data('show');
                    angular.element(id).modal();
                }, 400);
            });
        }
    };
});