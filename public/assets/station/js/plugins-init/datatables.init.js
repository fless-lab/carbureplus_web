
// var table = $('#dataTable')
// .DataTable({
//     "language": {
// "sEmptyTable":     "Aucune donnée disponible dans le tableau",
// "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
// "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
// "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
// "sInfoPostFix":    "",
// "sInfoThousands":  ",",
// "sLengthMenu":     "Afficher _MENU_ éléments",
// "sLoadingRecords": "Chargement...",
// "sProcessing":     "Traitement...",
// "sSearch":         "Rechercher :",
// "sZeroRecords":    "Aucun élément correspondant trouvé",
// "oPaginate": {
//     "sFirst":    "Premier",
//     "sLast":     "Dernier",
//     "sNext":     "Suivant",
//     "sPrevious": "Précédent"
// },
// "oAria": {
//     "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
//     "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
// },
// "select": {
//     "rows": {
//         "_": "%d lignes sélectionnées",
//         "0": "Aucune ligne sélectionnée",
//         "1": "1 ligne sélectionnée"
//     }
// }
// },
// });

(function ($) {
    "use strict"
    //example 1
    var table = $('#example').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        },
        "language": {
            "sEmptyTable": "Aucune donnée disponible dans le tableau",
            "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            }
        },
    });

    table.on('click', 'tbody tr', function () {
        var $row = table.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table.rows().every(function () {
        this.nodes().to$().removeClass('selected')
    });



    //example 2
    var table2 = $('#example2').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        },

        "scrollY": "42vh",
        "scrollCollapse": true,
        "paging": false
    });

    table2.on('click', 'tbody tr', function () {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table2.rows().every(function () {
        this.nodes().to$().removeClass('selected')
    });

})(jQuery);
