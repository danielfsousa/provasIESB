app.controller('visualizarRecursoController', function ($scope, $state, $stateParams, recursoServico, toastr, estado) {

    var id = $stateParams.id;

    recursoServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.recurso = res.data.recurso;
            $scope.questao = res.data.recurso.questao_obj;
        })
        .catch(function (res) {
            console.log(res); //log
            if (res.data.erro) {
                toastr.error(res.data.erro);
            } else {
                toastr.error('Não foi possível obter o recurso');
            }
            $state.go('template.listarRecursos');
    });

    $scope.aprovar = function (recurso) {
        recursoServico.aprovar(recurso.id)
            .then(function (res) {
                toastr.success('O recurso "' + recurso.titulo + '" foi aprovado.');
                recurso.estado.id = estado.APROVADO;
                recurso.estado.nome = 'Aprovado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível aprovar o recurso "' + recurso.titulo + '".');
            });
    };

    $scope.recusar = function (recurso) {
        recursoServico.recusar(recurso.id)
            .then(function (res) {
                toastr.success('O recurso "' + recurso.titulo + '" foi recusado.');
                recurso.estado.id = estado.RECUSADO;
                recurso.estado.nome = 'Recusado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível recusar o recurso "' + recurso.titulo + '".');
            });
    };

    $scope.excluir = function (recurso) {
        recursoServico.excluir(recurso.id)
            .then(function (res) {
                toastr.success('O recurso "' + recurso.titulo + '" foi excluído.');
                $state.go('template.listarRecursos');
            })
            .catch(function (res) {
                toastr.error('Não foi possível excluir o recurso "' + recurso.titulo + '".');
            });
    };

});