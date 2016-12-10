app.controller('criarRecursoController', function ($scope, $state, recursoServico, disciplinaServico, turmaServico, toastr) {

    disciplinaServico.getAll()
        .then(function (res) {
            console.log(res); //log
            $scope.disciplinas = res.data.disciplinas;
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as disciplinas');
            console.log(res); //log
        });

    turmaServico.getAll()
        .then(function (res) {
            console.log(res); //log
            $scope.turmas = res.data.turmas;
        })
        .catch(function (res) {
            toastr.error('Não foi possível obter as turmas');
            console.log(res); //log
        });

    $scope.salvar = function (recurso) {
        console.log(recurso); //log
        if (recurso && recurso.disciplina && recurso.turma) {
            var data = {
                titulo: recurso.titulo,
                prova: recurso.prova,
                questao: recurso.questao,
                descricao: recurso.descricao,
                disciplina_id: recurso.disciplina.id,
                turma_id: recurso.turma.id
            };

            recursoServico.criar(data)
                .then(function (res) {
                    toastr.success('O recurso "' + recurso.titulo + '" foi criado.');
                    $state.go('template.listarRecursos');
                    console.log(res); //log
                })
                .catch(function (res) {
                    toastr.error('Não foi possível criar o recurso');
                    console.log(res); //log
                });
        } else {
            toastr.error('Preencha todos os campos');
        }
    }

});