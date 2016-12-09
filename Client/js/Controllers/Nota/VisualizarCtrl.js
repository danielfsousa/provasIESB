app.controller('visualizarNotaController', function ($scope, $state, $stateParams, notaServico, toastr) {

    var id = $stateParams.id;

    notaServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.nota = res.data.nota;
        })
        .catch(function (res) {
            console.log(res); //log
            if (res.data.erro) {
                toastr.error(res.data.erro);
            } else {
                toastr.error('Não foi possível obter a nota');
            }
            $state.go('template.listarNotas');
        });

});