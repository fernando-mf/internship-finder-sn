$(document).ready(function () {

    $("#company_search").select2({
        language: 'fr',
        theme: "bootstrap",
        width: '100%',
        language: {
            noResults: function () {
                return "<a onclick='handle(this,event)' id='link' >Ajouter manuellement</a>";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    window.handle = function (o, e) {
        e.preventDefault();

        // Select Data
        var data = {
            "id": "",
        };

        // Trigger event
        $('#company_search').trigger({
            type: 'select2:select',
            params: {
                data: data
            }
        });
        
        // Change value
        $('#company_search').val("").trigger('change');

        // Close
        $('#company_search').select2('close');
    };

    $('#company_search').on("select2:select", function (e) {
        var id = e.params.data.id;
        if (id === "") {
            $("#company").val("");
            $("#website").val("");
            $("#phone").val("");
            $("#up").val("");
        } else {
            $.ajax({
                accepts: {
                    json: 'application/json'
                },
                dataType: 'json',
                url: apiBase + "/" + id,
                type: 'GET',

                complete: function (resultat, statut) {
                    var company = resultat.responseJSON;

                    $("#company").val(company.name);
                    $("#website").val(company.website);
                    $("#phone").val(company.phone);
                    $("#up").val(company.id);
                }

            });
        }
    });
});