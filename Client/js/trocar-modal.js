$('.trocar-modal').on('click', function (e) {
    setTimeout(function () {
        var id = $(e.target).data('show');
        $(id).modal();
    }, 400);
});