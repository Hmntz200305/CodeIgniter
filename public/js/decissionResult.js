// TABLE DecissionResult
$(document).ready(function() {
    $('#decissionResult').DataTable({
        "scrollX": false,
        "scrollCollapse": false,
        "dom": '<"flex justify-between items-center mb-2"Bf>t<"flex justify-between items-center mt-2"lrp>',
        "pagingType": 'simple_numbers',
        "ordering": false,
        "select": true,
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
            },
            {
                "extend": 'print',
                "className": 'custom-collection',
                "text": '<h3 class="bg-white border-l-4 font-medium hover:text-rose-600 hover:border-rose-600 py-2 px-3 text-sm">Print Selected</h3>',

            }
        ],
    });
});

// MODAL DELETE
const modalDeleteDecissionResult = document.querySelector('.modalDeleteDecissionResult');
const modalDeleteDecissionResultOpen = document.getElementById('modalDeleteDecissionResultOpen');
const modalDeleteDecissionResultClose = document.getElementById('modalDeleteDecissionResultClose');

modalDeleteDecissionResultOpen.addEventListener('click', () => {
    modalDeleteDecissionResult.classList.toggle('hidden');
});
modalDeleteDecissionResultClose.addEventListener('click', () => {
    modalDeleteDecissionResult.classList.add('hidden');
});

// MODAL CLEAR
const modalClearDecissionResult = document.querySelector('.modalClearDecissionResult');
const modalClearDecissionResultOpen = document.getElementById('modalClearDecissionResultOpen');
const modalClearDecissionResultClose = document.getElementById('modalClearDecissionResultClose');

modalClearDecissionResultOpen.addEventListener('click', () => {
    modalClearDecissionResult.classList.toggle('hidden');
});
modalClearDecissionResultClose.addEventListener('click', () => {
    modalClearDecissionResult.classList.add('hidden');
});