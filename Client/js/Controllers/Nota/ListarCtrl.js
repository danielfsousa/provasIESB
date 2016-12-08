app.controller('listarNotasController', function ($scope, $state, notaServico, toastr, DTOptionsBuilder, DTColumnDefBuilder, estado) {

    function getParams() {
        var params = {};

        switch ($state.current.name) {
            case 'template.provasAguardando':
                params = { estado: estado.AGUARDANDO_APROVACAO };
                break;

            case 'template.provasAceitas':
                params = { estado: estado.APROVADO };
                break;

            case 'template.provasRecusadas':
                params = { estado: estado.RECUSADO };
                break;
        }

        return params;
    }

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('full_numbers')
        .withLanguageSource('/lang/datatables.pt-BR.json')
        .withOption('aaSorting', [0, 'asc']);

    $scope.dtColumnsDefs = [
        DTColumnDefBuilder.newColumnDef(7).notSortable()
    ];

    notaServico.getAll(getParams())
        .then(function (res) {
            console.log(res); // log
            $scope.notas = res.data.notas;
            $scope.quantidade = res.data.quantidade;
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as notas');
            console.log(res); // log
    });


});