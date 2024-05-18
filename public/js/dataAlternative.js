// TABLE ALTERNATIVE
$(document).ready(function() {
    $('#dataAlternative').DataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "dom": '<"flex justify-between items-center mb-2"Bf>t<"flex justify-between items-center mt-2"lrp>',
        "pagingType": 'simple_numbers',
        "buttons": [
            {
                "extend": 'collection',
                "className": 'custom-collection',
                "text": '<h3 class="bg-white dark:bg-slate-800 dark:text-gray-300 dark:border-gray-700 border-l-4 font-medium hover:text-rose-600 dark:hover:text-rose-600 hover:border-rose-600 dark:hover:border-rose-600 py-2 px-3 text-sm">Collection</h3>',
                "buttons": [
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-pdf-2-line"></i><span>PDF</span></div>',
                        "extend": 'pdfHtml5',
                        "exportOptions": {
                            "columns": [ 0, 1, 2 ]
                        },
                        "title": 'Data Alternative',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Data Alternative',
                        "exportOptions": {
                            "columns": [ 0, 1, 2 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Data Alternative',
                        "messageTop": 'Below is the data extracted from the Data Alternative table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Data Alternative',
                        "messageTop": 'Below is the data extracted from the Data Alternative table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#dataAlternative thead th').css({
        'background-color': 'rgb(225 29 72)',
        'color': 'white',
        'font-weight': '600',
        'border': 'none',
        // 'border': '1px solid rgb(55 65 81)',
    });
    $('#toggleBtn').on('click', function() {
        const sidebar = $('#sidebar');
        const isCollapsed = sidebar.width() === 92;

        sidebar.width(isCollapsed ? 256 : 92);
        setTimeout(() => {
            $(window).trigger('resize');
        }, 300);
    });
});



function showConfirmationDeleteModalAlternative(form) {
    document.getElementById('modalDeleteAlternative').classList.remove('hidden');
    document.getElementById('modalDeleteButtonAlternative').addEventListener('click', function() {
        form.submit();
    });

    document.getElementById('modalDeleteAlternativeClose').addEventListener('click', function() {
        // Sembunyikan modal
        document.getElementById('modalDeleteAlternative').classList.add('hidden');
    });
    return false;
}

// FUNCTION EDIT
function showEditAlternative(id) {
    window.location.href = "dataalternative/editdata/" + id;
}