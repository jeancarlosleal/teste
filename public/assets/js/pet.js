var pet = {
    init: function () {
        pet.removePet();
        pet.openAction();
    },
    removePet: function () {
        $("button[data-action='remove']").click(function () {
            $.ajax("/pet/" + $(this).data('id') + "/remover")
                    .done(function (data) {
                        location.reload();
                    });
        });
    },
    openAction: function () {
        $("button[data-pet='true']").click(function () {
            var url = '/pet/' + $(this).data('id') + '/' + $(this).data('method');

            $.ajax(url)
                    .done(function (data) {
                        $('#actionPet > div > div').html(data);
                        $('#actionPet').modal('show');
                        pet.saveAction();
                    });
        });
    },
    saveAction: function () {
        $("button#savePet").click(function () {
            $.ajax({
                type: "POST",
                url: "/pet/salvar",
                data: $('form#formPet').serialize(),
                success: function () {
                    $('#actionPet').modal('hide');
                    location.reload();
                }
            });
        });
    }

};

$(document).ready(function () {
    pet.init();
});

