/**
 * Created by danilo on 04/12/16.
 */
app.controller('CriarQuestaoCtrl', function (questaoServico, toastr) {

    var vm = this;

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

    vm.titulo = '';
    vm.dificuldade = '';
    vm.gabarito = '';
    vm.enunciado = '';
    vm.alternativaA = '';
    vm.alternativaB = '';
    vm.alternativaC = '';
    vm.alternativaD = '';
    vm.alternativaE = '';
    vm.disciplinaProva = '';

    function verificaCampos() {
        console.log(vm.titulo, vm.dificuldade, vm.gabarito, vm.enunciado, vm.alternativaA, vm.alternativaB, vm.alternativaC, vm.alternativaD, vm.alternativaE, vm.disciplinaProva);
        if (vm.titulo != '' && vm.dificuldade != '' && vm.gabarito != '' && vm.enunciado != ''
            && vm.alternativaA != '' && vm.alternativaB != '' && vm.alternativaC != '' && vm.alternativaD != ''
            && vm.alternativaE != '' && vm.disciplinaProva != '') {
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
        } else {
            toastr.error('Todos os campos são obrigatórios', 'ERRO');
        }
    };

    vm.salvarRascunho = function () {
        //TODO salvar o rascunho
        /*
         * Será em tabela ou localStorage?
         */
    };


});