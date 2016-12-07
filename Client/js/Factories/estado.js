app.factory('estado', function () {

    return {
        AGUARDANDO_APROVACAO: 1,
        APROVADO: 2,
        RECUSADO: 3,
        AGUARDANDO_CORRECAO: 4,
        CORRIGIDO: 5
    };

});