app.directive('editor', function () {
    return {
        restrict: 'A',
        require: '?ngModel',
        link: function ($scope, elem, attrs, ngModel) {

            var altura = (attrs.editor === 'pequeno') ? 150 : 300;

            var ck = CKEDITOR.replace(elem[0], {
                uiColor: '#f9f9f9',
                height: altura
            });

            ck.on('instanceReady', function() {
                ck.setData(ngModel.$viewValue);
            });

            ck.on('pasteState', function() {
                $scope.$apply(function() {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function(value) {
                ck.setData(ngModel.$modelValue);
            };
        }
    };
});