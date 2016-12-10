app.controller('visualizarQuestaoController', function ($scope, $state, $stateParams, questaoServico, toastr, estado) {

    var id = $stateParams.id;

    questaoServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.questao = res.data.questao;
        })
        .catch(function (res) {
            console.log(res); //log
            if (res.data.erro) {
                toastr.error(res.data.erro);
            } else {
                toastr.error('Não foi possível obter a questão');
            }
            $state.go('template.listarQuestoes');
    });

    $scope.aprovar = function (questao) {
        questaoServico.aprovar(questao.id)
            .then(function (res) {
                toastr.success('A questão "' + questao.titulo + '" foi aprovada.');
                questao.estado.id = estado.APROVADO;
                questao.estado.nome = 'Aprovado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível aprovar a questão "' + questao.titulo + '".');
            });
    };

    $scope.recusar = function (questao) {
        questaoServico.recusar(questao.id)
            .then(function (res) {
                toastr.success('A questão "' + questao.titulo + '" foi recusada.');
                questao.estado.id = estado.RECUSADO;
                questao.estado.nome = 'Recusado';
            })
            .catch(function (res) {
                toastr.error('Não foi possível recusar a questão "' + questao.titulo + '".');
            });
    };

});