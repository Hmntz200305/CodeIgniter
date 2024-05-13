// TABLE Assessment
$(document).ready(function() {
    $('#dataAssessment').DataTable({
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

// MODAL DELETE
const modalDeleteDataAssessment = document.querySelector('.modalDeleteDataAssessment');
const modalDeleteDataAssessmentOpen = document.getElementById('modalDeleteDataAssessmentOpen');
const modalDeleteDataAssessmentClose = document.getElementById('modalDeleteDataAssessmentClose');

modalDeleteDataAssessmentOpen.addEventListener('click', () => {
    modalDeleteDataAssessment.classList.toggle('hidden');
});
modalDeleteDataAssessmentClose.addEventListener('click', () => {
    modalDeleteDataAssessment.classList.add('hidden');
});

// MODAL CLEAR
const modalClearDataAssessment = document.querySelector('.modalClearDataAssessment');
const modalClearDataAssessmentOpen = document.getElementById('modalClearDataAssessmentOpen');
const modalClearDataAssessmentClose = document.getElementById('modalClearDataAssessmentClose');

modalClearDataAssessmentOpen.addEventListener('click', () => {
    modalClearDataAssessment.classList.toggle('hidden');
});
modalClearDataAssessmentClose.addEventListener('click', () => {
    modalClearDataAssessment.classList.add('hidden');
});