app.controller('listarQuestoesController', function ($scope, $state, questaoServico, toastr, DTOptionsBuilder, DTColumnDefBuilder, estado) {

    function getParams() {
        var params = {};

        switch ($state.current.name) {
            case 'template.questoesAguardando':
                params = { estado: estado.AGUARDANDO_APROVACAO };
                break;

            case 'template.questoesAceitas':
                params = { estado: estado.APROVADO };
                break;

            case 'template.questoesRecusadas':
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
        DTColumnDefBuilder.newColumnDef(6).notSortable()
    ];

    questaoServico.getAll(getParams())
        .then(function (res) {
            console.log(res); // log
            $scope.questoes = res.data.questoes;
            $scope.quantidade = res.data.quantidade;
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as questões');
            console.log(res); // log
    });

    $scope.visualizarQuestao = function (questao) {
        $scope.questaoAtual = questao;
    };

});