app.controller('listarRecursosController', function ($scope, recursoServico, toastr, DTOptionsBuilder, DTColumnDefBuilder) {

    function quantidadeQuestoes(recursos) {
        $scope.quantidadeTodas = recursos.length;
        $scope.quantidadeAguardando = 0;
        $scope.quantidadeAceitas = 0;
        $scope.quantidadeRecusadas = 0;

        angular.forEach(recursos, function (recurso) {
            switch (recurso.estado.nome) {
                case 'Aguardando aprovação':
                    $scope.quantidadeAguardando++;
                    break;
                case 'Aceito':
                    $scope.quantidadeAceitas++;
                    break;
                case 'Recusado':
                    $scope.quantidadeRecusadas++;
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

    recursoServico.getAll()
        .then(function (res) {
            console.log(res); // log
            $scope.recursos = res.data.recursos;
            quantidadeQuestoes(res.data.recursos);
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter os recursos');
            console.log(res); // log
        });


});