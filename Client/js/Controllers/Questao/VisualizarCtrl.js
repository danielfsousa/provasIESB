app.controller('visualizarQuestaoController', function ($scope, $state, $stateParams, questaoServico, toastr) {

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

});