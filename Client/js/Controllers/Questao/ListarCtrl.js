app.controller('listarQuestoesController', function ($scope, questaoServico, toastr) {

    function quantidadeQuestoes() {
        $scope.quantidadeAguardando = 0;
        $scope.quantidadeAceitas = 0;
        $scope.quantidadeRecusadas = 0;

        angular.forEach($scope.questoes, function (questao) {
            switch (questao.estado.nome) {
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

    questaoServico.getAll()
        .then(function (res) {
            $scope.questoes = res.data.questoes;
            console.log(res); // log
            quantidadeQuestoes();
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as questões.');
            console.log(res); // log
    });

});