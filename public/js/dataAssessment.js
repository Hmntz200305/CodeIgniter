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

function showConfirmationDeleteModal(form) {
    document.getElementById('modalDeleteDataAssessment').classList.remove('hidden');
    document.getElementById('modalDeleteButtonDataAssessment').addEventListener('click', function() {
        form.submit();
    });

    document.getElementById('modalDeleteDataAssessmentClose').addEventListener('click', function() {
        // Sembunyikan modal
        document.getElementById('modalDeleteDataAssessment').classList.add('hidden');
    });
    return false;
}

function showConfirmationClearModal(form) {
    document.getElementById('modalClearDataAssessment').classList.remove('hidden');
    document.getElementById('modalClearTableButtonDataAssessment').addEventListener('click', function() {
        form.submit();
    });

    document.getElementById('modalClearDataAssessmentClose').addEventListener('click', function() {
        // Sembunyikan modal
        document.getElementById('modalClearDataAssessment').classList.add('hidden');
    });
    return false;
}


// FUNCTION EDIT
function showEditAssessment(id) {
    window.location.href = "dataassessment/editdata/" + id;
}