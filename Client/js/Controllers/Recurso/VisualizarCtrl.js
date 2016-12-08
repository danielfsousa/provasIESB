app.controller('visualizarRecursoController', function ($scope, $state, $stateParams, recursoServico, toastr) {

    var id = $stateParams.id;

    recursoServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.recurso = res.data.recurso;
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

});