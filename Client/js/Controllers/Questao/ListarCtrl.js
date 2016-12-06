app.controller('listarQuestoesController', function ($scope, questaoServico, toastr, DTOptionsBuilder, DTColumnDefBuilder) {

    function quantidadeQuestoes(questoes) {
        $scope.quantidadeTodas = questoes.length;
        $scope.quantidadeAguardando = 0;
        $scope.quantidadeAceitas = 0;
        $scope.quantidadeRecusadas = 0;

        angular.forEach(questoes, function (questao) {
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

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('full_numbers')
        .withLanguageSource('/lang/datatables.pt-BR.json')
        .withOption('aaSorting', [0, 'asc']);

    $scope.dtColumnsDefs = [
        DTColumnDefBuilder.newColumnDef(6).notSortable()
    ];

    questaoServico.getAll()
        .then(function (res) {
            $scope.questoes = res.data.questoes;
            quantidadeQuestoes(res.data.questoes);
            console.log(res); // log
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as questões');
            console.log(res); // log
        });


});