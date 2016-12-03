app.directive('editor', function () {
    return {
        restrict: 'A',
        link: function (scope, elem, attrs) {
            var altura = (attrs.editor === 'pequeno') ? 150 : 300;
            CKEDITOR.replace(elem[0], {
                uiColor: '#f9f9f9',
                height: altura
            });
        }
    };
});