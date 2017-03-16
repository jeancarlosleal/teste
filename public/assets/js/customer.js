var customer = {
    init: function () {
        customer.editCustomer();
        customer.addCustomer();
        customer.removeCustomer();
    },
    editCustomer: function () {
        $('button.editCustomer').click(function () {
            window.location.href = $(this).data('link');
        });
    },
    addCustomer: function () {
        $('button.addCustomer').click(function () {
            window.location.href = $(this).data('link');
        });
    },
    removeCustomer: function () {
        $("button[data-action='remove']").click(function () {
            $.ajax("/cliente/" + $(this).data('id') + "/remover")
                    .done(function (data) {
                        location.reload();
                    });
        });
    }

};

$(document).ready(function () {
    customer.init();
});

