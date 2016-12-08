/**
 * Created by lorran on 08/12/16.
 */
app.controller('CriarProvaCtrl', function (provaServico) {

    var vm = this;

    vm.prova = [
        {
            id: 1,
            nome: 'P1'
        },
        {
            id: 2,
            nome: 'P2'
        },
        {
            id: 3,
            nome: 'P3'
        }
     ];

    vm.disciplina = [
        {
            id: 1,
            nome: 'Web I'
        },
        {
            id: 2,
            nome: 'Web II'
        },
        {
            id: 3,
            nome: 'Android'
        },
        {
            id: 4,
            nome: 'Java I'
        }

    ];

    vm.turma = [
            {
                id: 1,
                nome: '1'
            },
            {
                id: 2,
                nome: '2'
            },
            {
                id: 3,
                nome: '3'
            },
            {
                id: 4,
                nome: '4'
            }
    ];

    function verificaCampos() {
        if (vm.titulo != '' && vm.dificuldade != '' && vm.gabarito != '' && vm.enunciado != ''
            && vm.alternativaA != '' && vm.alternativaB != '' && vm.alternativaC != '' && vm.alternativaD != ''
            && vm.alternativaE != '' && vm.disciplinaProva) {
            return true;
        }
        return false;
    }

    vm.enviarQuestao = function () {
        if (verificaCampos()) {
            var questao = {
                titulo: vm.titulo,
                dificuldade: vm.dificuldade,
                gabarito: vm.gabarito,
                enunciado: vm.enunciado,
                alternativas: {
                    A: vm.alternativaA,
                    B: vm.alternativaB,
                    C: vm.alternativaC,
                    D: vm.alternativaD,
                    E: vm.alternativaE
                },
                disciplina: vm.disciplinaProva
            };
            questaoServico.criarQuestao(questao); //TODO implementar este método
        }
    };

    vm.salvarRascunho = function () {
        //TODO salvar o rascunho
        /*
         * Será em tabela ou localStorage?
         */
    };


});