$(document).ready(function() {
    $('#historyDelete').DataTable({
        "scrollX": false,
        "scrollCollapse": false,
        "dom": '<"flex justify-between items-center mb-2"Bf>t<"flex justify-between items-center mt-2"lrp>',
        "pagingType": 'simple_numbers',
        "buttons": [
            {
                "extend": 'collection',
                "className": 'custom-collection',
                "text": '<h3 class="bg-white border-l-4 font-medium hover:text-rose-600 hover:border-rose-600 py-2 px-3 text-sm">Collection</h3>',
                "buttons": [
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-pdf-2-line"></i><span>PDF</span></div>',
                        "extend": 'pdf',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                    },
                ]
            }
        ],
    });
});

$(document).ready(function() {
    $('#historyEdit').DataTable({
        "scrollX": false,
        "scrollCollapse": false,
        "dom": '<"flex justify-between items-center mb-2"Bf>t<"flex justify-between items-center mt-2"lrp>',
        "pagingType": 'simple_numbers',
        "buttons": [
            {
                "extend": 'collection',
                "className": 'custom-collection',
                "text": '<h3 class="bg-white border-l-4 font-medium hover:text-rose-600 hover:border-rose-600 py-2 px-3 text-sm">Collection</h3>',
                "buttons": [
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-pdf-2-line"></i><span>PDF</span></div>',
                        "extend": 'pdf',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                    },
                ]
            }
        ],
    });
});

$(document).ready(function() {
    $('#historyInsert').DataTable({
        "scrollX": false,
        "scrollCollapse": false,
        "dom": '<"flex justify-between items-center mb-2"Bf>t<"flex justify-between items-center mt-2"lrp>',
        "pagingType": 'simple_numbers',
        "buttons": [
            {
                "extend": 'collection',
                "className": 'custom-collection',
                "text": '<h3 class="bg-white border-l-4 font-medium hover:text-rose-600 hover:border-rose-600 py-2 px-3 text-sm">Collection</h3>',
                "buttons": [
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-pdf-2-line"></i><span>PDF</span></div>',
                        "extend": 'pdf',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-line"></i><span>CSV</span></div>',
                        "extend": 'csv',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-file-excel-2-line"></i><span>Excel</span></div>',
                        "extend": 'excel',
                    },
                    {
                        "text": '<div class="flex items-center space-x-1 hover:text-rose-600"><i class="ri-printer-line"></i><span>Print</span></div>',
                        "extend": 'print',
                    },
                ]
            }
        ],
    });
});


// MODAL CLEAR
const modalClearHistoryDelete = document.querySelector('.modalClearHistoryDelete');
const modalClearHistoryDeleteOpen = document.getElementById('modalClearHistoryDeleteOpen');
const modalClearHistoryDeleteClose = document.getElementById('modalClearHistoryDeleteClose');

modalClearHistoryDeleteOpen.addEventListener('click', () => {
    modalClearHistoryDelete.classList.toggle('hidden');
});
modalClearHistoryDeleteClose.addEventListener('click', () => {
    modalClearHistoryDelete.classList.add('hidden');
});

const modalClearHistoryEdit = document.querySelector('.modalClearHistoryEdit');
const modalClearHistoryEditOpen = document.getElementById('modalClearHistoryEditOpen');
const modalClearHistoryEditClose = document.getElementById('modalClearHistoryEditClose');

modalClearHistoryEditOpen.addEventListener('click', () => {
    modalClearHistoryEdit.classList.toggle('hidden');
});
modalClearHistoryEditClose.addEventListener('click', () => {
    modalClearHistoryEdit.classList.add('hidden');
});

const modalClearHistoryInsert = document.querySelector('.modalClearHistoryInsert');
const modalClearHistoryInsertOpen = document.getElementById('modalClearHistoryInsertOpen');
const modalClearHistoryInsertClose = document.getElementById('modalClearHistoryInsertClose');

modalClearHistoryInsertOpen.addEventListener('click', () => {
    modalClearHistoryInsert.classList.toggle('hidden');
});
modalClearHistoryInsertClose.addEventListener('click', () => {
    modalClearHistoryInsert.classList.add('hidden');
});