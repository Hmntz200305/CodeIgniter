// TABLE DecissionResult
$(document).ready(function() {
    $('#decissionResult').DataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "ordering": false,
        "pageLength" : 16,
        "lengthMenu": [ [8, 16, 24, 32, 64, -1], [8, 16, 32, 64, "All"] ],
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
                            "columns": [ 0, 1, 2, 3, 4 ]
                        },
                        "title": 'Decission Result',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Decission Result',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Decission Result',
                        "messageTop": 'Below is the data extracted from the Decission Result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": '<div class="flex mt-2 flex-col text-black dark:text-white"><div class="text-center border-b-4 border-black"><h1 class="text-3xl font-bold">PT. SINAR YOUR ZERO XYZ</h1><span class="text-xs">Driscoll Leach P.O. Box 120 2410 Odio Avenue Pass Christian Delaware 03869 (726) 710-9826</span></div><div class="mt-4"><h3 class="font-bold text-xl text-center">Surat Keputusan Penilaian Kualitas Produk</h3><p class="mt-1 text-xs text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p></div>',
                        "messageTop": 'Below is the data extracted from the Decission Result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#decissionResult thead th').css({
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

// MODAL CLEAR
function showConfirmationClearModalDecicionResult(form) {
    document.getElementById('modalClearDecissionResult').classList.remove('hidden');
    document.getElementById('modalClearDecissionResultOpen').addEventListener('click', function() {
        form.submit();
    });

    document.getElementById('modalClearDecissionResultClose').addEventListener('click', function() {
        // Sembunyikan modal
        document.getElementById('modalClearDecissionResult').classList.add('hidden');
    });
    return false;
}
