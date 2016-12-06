app.controller('listarProvasController', function ($scope, provaServico, toastr, DTOptionsBuilder, DTColumnDefBuilder) {

    function quantidadeProvas(provas) {
        $scope.quantidadeTodas = provas.length;
        $scope.quantidadeAguardando = 0;
        $scope.quantidadeAceitas = 0;
        $scope.quantidadeRecusadas = 0;

        angular.forEach(provas, function (prova) {
            switch (prova.estado.nome) {
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
        .withOption('aaSorting', [1, 'asc']);

    $scope.dtColumnsDefs = [
        DTColumnDefBuilder.newColumnDef(6).notSortable(),
        DTColumnDefBuilder.newColumnDef(7).notSortable()
    ];

    provaServico.getAll()
        .then(function (res) {
            console.log(res); // log
            $scope.provas = res.data.provas;
            quantidadeProvas(res.data.provas);
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as provas');
            console.log(res); // log
    });

    $scope.provaAtual = function (obj) {
        console.info(obj);
    }


});