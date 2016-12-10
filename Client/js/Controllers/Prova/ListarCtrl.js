app.controller('listarProvasController', function ($scope, $state, provaServico, toastr, DTOptionsBuilder, DTColumnDefBuilder, estado) {

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

    function atualizarProvas() {
        provaServico.getAll(getParams())
            .then(function (res) {
                console.log(res); // log
                $scope.provas = res.data.provas;
                $scope.quantidade = res.data.quantidade;
            })
            .catch(function (res) {
                toastr.error('Não foi possível obter as provas');
                console.log(res); // log
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

    $scope.visualizarProva = function (prova) {
        $scope.provaAtual = prova;
        provaServico.getById(prova.id)
            .then(function (res) {
                console.info(res);
                $scope.provaAtual = res.data.prova;
            })
            .catch(function (res) {
                toastr.error('Não foi possível obter a prova');
        });
    };

    $scope.aprovar = function (prova) {
      provaServico.aprovar(prova.id)
          .then(function (res) {
              toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi aprovada.');
              atualizarProvas();
          })
          .catch(function (res) {
              toastr.error('Não foi possível aprovar a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
      });
    };

    $scope.recusar = function (prova) {
        provaServico.recusar(prova.id)
            .then(function (res) {
                toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi recusada.');
                atualizarProvas();
            })
            .catch(function (res) {
                toastr.error('Não foi possível recusar a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
            });
    };

    $scope.excluir = function (prova) {
        provaServico.excluir(prova.id)
            .then(function (res) {
                toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi excluída.');
                atualizarProvas();
            })
            .catch(function (res) {
                toastr.error('Não foi possível excluir a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
        });
    };

    atualizarProvas();

});