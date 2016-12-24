/**
 * Created by lorran on 08/12/16.
 */
app.controller('CriarProvaCtrl', function () {

    var vm = this;
    vm.selecao={
        prova:'',
        turma:'',
        disciplina:''
    }
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

});