app.controller('visualizarProvaController', function ($scope, $state, $stateParams, provaServico, toastr) {

    var id = $stateParams.id;

    provaServico.getById(id)
        .then(function (res) {
            console.log(res); //log
            $scope.prova = res.data.prova;
        })
        .catch(function (res) {
            console.log(res); //log
            if (res.data.erro) {
                toastr.error(res.data.erro);
            } else {
                toastr.error('Não foi possível obter a prova');
            }
            $state.go('template.listarProvas');
    });

});