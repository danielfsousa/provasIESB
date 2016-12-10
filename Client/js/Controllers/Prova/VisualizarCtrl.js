app.controller('visualizarProvaController', function ($scope, $state, $stateParams, provaServico, toastr, estado) {

    var id = $stateParams.id;

    provaServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.prova = res.data.prova;
        })
        .catch(function (res) {
            console.log(res); //log
            if (res.data.erro) {
                toastr.error(res.data.erro);
            } else {
                toastr.error('Não foi possível obter a prova');
            }
            $state.go('template.listarProvas');
    });

    $scope.aprovar = function (prova) {
        provaServico.aprovar(prova.id)
            .then(function (res) {
                toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi aprovada.');
                prova.estado.id = estado.APROVADO;
                prova.estado.nome = 'Aprovado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível aprovar a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
            });
    };

    $scope.recusar = function (prova) {
        provaServico.recusar(prova.id)
            .then(function (res) {
                toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi recusada.');
                prova.estado.id = estado.RECUSADO;
                prova.estado.nome = 'Recusado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível recusar a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
        });
    };

    $scope.excluir = function (prova) {
        provaServico.excluir(prova.id)
            .then(function (res) {
                toastr.success('A prova "' + prova.prova + ' - ' + prova.disciplina.nome + '" foi excluída.');
                $state.go('template.listarProvas');
            })
            .catch(function (res) {
                toastr.error('Não foi possível excluir a prova "' + prova.prova + ' - ' + prova.disciplina.nome + '".');
            });
    };

});