app.directive('dropify', function () {
    return {
        restrict: 'A',
        link: function (scope, elem, attrs) {
            angular.element(elem).dropify({
                messages: {
                    'default': 'Arraste e solte um arquivo ou clique aqui',
                    'replace': 'Arraste e solte ou clique aqui para alterar',
                    'remove':  'Remover',
                    'error':   'Algo deu errado ao carregar o arquivo'
                },
                error: {
                    'fileSize': 'O arquivo é muito grande. (Máximo: {{ value }}).',
                    'fileExtension': 'O formato de arquivo não é permitido. (Permitidos: {{ value }}).',
                    'imageFormat': 'O formato da imagem não é permitido. (Permitidos: {{ value }}).'
                }
            });
        }
    };
});