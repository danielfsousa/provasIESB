app.controller('listarRecursosController', function ($scope, $state, recursoServico, toastr, DTOptionsBuilder, DTColumnDefBuilder, estado) {

    function getParams() {
        var params = {};

        switch ($state.current.name) {
            case 'template.recursosAguardando':
                params = { estado: estado.AGUARDANDO_APROVACAO };
                break;

            case 'template.recursosAceitos':
                params = { estado: estado.APROVADO };
                break;

            case 'template.recursosRecusados':
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

    function atualizarRecursos() {
        recursoServico.getAll(getParams())
            .then(function (res) {
                console.log(res); // log
                $scope.recursos = res.data.recursos;
                $scope.quantidade = res.data.quantidade;
            })
            .catch(function (res) {
                toastr.error('Não foi possível obter os recursos');
                console.log(res); // log
            });
    }

    $scope.visualizarRecurso = function (recurso) {
        $scope.recursoAtual = recurso;
    };

    $scope.aprovar = function (recurso) {
        recursoServico.aprovar(recurso.id)
            .then(function (res) {
                toastr.success('O recurso "' + recurso.titulo + '" foi aprovado.');
                atualizarRecursos();
            })
            .catch(function (res) {
                toastr.error('Não foi possível aprovar o recurso "' + recurso.titulo + '".');
            });
    };

    $scope.recusar = function (recurso) {
        recursoServico.recusar(recurso.id)
            .then(function (res) {
                toastr.success('O recurso "' + recurso.titulo + '" foi recusado.');
                atualizarRecursos();
            })
            .catch(function (res) {
                toastr.error('Não foi possível recusar o recurso "' + recurso.titulo + '".');
        });
    };

    atualizarRecursos();

});