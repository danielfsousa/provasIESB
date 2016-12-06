app.controller('listarNotasController', function ($scope, notaServico, toastr, DTOptionsBuilder, DTColumnDefBuilder) {

    function quantidadeQuestoes(notas) {
        $scope.quantidadeTodas = notas.length;
        $scope.quantidadeAguardando = 0;
        $scope.quantidadeCorrigidas = 0;

        angular.forEach(notas, function (nota) {
            switch (nota.estado.nome) {
                case 'Aguardando correção':
                    $scope.quantidadeAguardando++;
                    break;
                case 'Corrigido':
                    $scope.quantidadeCorrigidas++;
                    break;
            }
        });
    }

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('full_numbers')
        .withLanguageSource('/lang/datatables.pt-BR.json')
        .withOption('aaSorting', [0, 'asc']);

    $scope.dtColumnsDefs = [
        DTColumnDefBuilder.newColumnDef(7).notSortable()
    ];

    notaServico.getAll()
        .then(function (res) {
            console.log(res); // log
            $scope.notas = res.data.notas;
            quantidadeQuestoes(res.data.notas);
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as notas');
            console.log(res); // log
        });


});