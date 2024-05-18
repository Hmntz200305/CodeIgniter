$(document).ready(function() {
    $('#firstTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Data for each product against Criteria',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Data for each product against Criteria',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Data for each product against Criteria',
                        "messageTop": 'Below is the data extracted from the Data for each product against Criteria table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Data for each product against Criteria',
                        "messageTop": 'Below is the data extracted from the Data for each product against Criteria table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#firstTable thead th').css({
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

$(document).ready(function() {
    $('#secondTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Calculating normalization values',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Calculating normalization values',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Calculating normalization values',
                        "messageTop": 'Below is the data extracted from the Calculating normalization values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Calculating normalization values',
                        "messageTop": 'Below is the data extracted from the Calculating normalization values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#secondTable thead th').css({
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

$(document).ready(function() {
    $('#thirdTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Normalization result',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Normalization result',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Normalization result',
                        "messageTop": 'Below is the data extracted from the Normalization result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Normalization result',
                        "messageTop": 'Below is the data extracted from the Normalization result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#thirdTable thead th').css({
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

$(document).ready(function() {
    $('#fourthTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Calculating preference values',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Calculating preference values',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Calculating preference values',
                        "messageTop": 'Below is the data extracted from the Calculating preference values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Calculating preference values',
                        "messageTop": 'Below is the data extracted from the Calculating preference values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#fourthTable thead th').css({
        'background-color': 'rgb(225 29 72)',
        'color': 'white',
        'font-weight': '600',
        'border': 'none',
        // 'border': '1px solid rgb(55 65 81)',
    });
    $('#fourthTable tfoot td').css({
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

$(document).ready(function() {
    $('#fifthTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Preference result',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Preference result',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Preference result',
                        "messageTop": 'Below is the data extracted from the Preference result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Preference result',
                        "messageTop": 'Below is the data extracted from the Preference result table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#fifthTable thead th').css({
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

$(document).ready(function() {
    $('#sixthTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Calculating total Preference values',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Calculating total Preference values',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Calculating total Preference values',
                        "messageTop": 'Below is the data extracted from the Calculating total Preference values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Calculating total Preference values',
                        "messageTop": 'Below is the data extracted from the Calculating total Preference values table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#sixthTable thead th').css({
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

$(document).ready(function() {
    $('#seventhTable').DataTable({
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
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                        "title": 'Ranking',
                        "customize": function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                        "title": 'Ranking',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                        "title": 'Ranking',
                        "messageTop": 'Below is the data extracted from the Ranking table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                        "title": 'Ranking',
                        "messageTop": 'Below is the data extracted from the Ranking table, ready for export and further analysis.',
                        "exportOptions": {
                            "columns": [ 0, 1, 2, 3, 4, 5 ]
                        },
                    },
                ],
            }
        ],
    });
    $('#seventhTable thead th').css({
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

