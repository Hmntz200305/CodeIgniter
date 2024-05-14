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
const modalDeleteDataAssessmentOpen = document.querySelectorAll('.dataassesment-delete-btn');
const modalDeleteDataAssessmentClose = document.getElementById('modalDeleteDataAssessmentClose');

modalDeleteDataAssessmentOpen.forEach(button => {
    button.addEventListener('click', () => {
        const id_penilaian = button.dataset.id;
        modalDeleteDataAssessment.classList.remove('hidden');

        const deleteButton = document.getElementById('modalDeleteButtonDataAssessment');
        deleteButton.addEventListener('click', () => {
            confirmDeletePenilaian(id_penilaian);
        });
    });
});

modalDeleteDataAssessmentClose.addEventListener('click', () => {
    modalDeleteDataAssessment.classList.add('hidden');
});

// FUNCTION DELETE
function confirmDeletePenilaian(id) {
    fetch("dataassessment/deleteprocess/" + id, {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            window.location.href = "dataassessment"
        } else {
            pass
        }
    })
    .catch(error => {
        // Kesalahan dalam melakukan permintaan, lakukan sesuatu jika perlu
        console.error("Terjadi kesalahan:", error);
    });
}

// MODAL CLEAR
const modalClearDataAssessment = document.querySelector('.modalClearDataAssessment');
const modalClearDataAssessmentOpen = document.querySelectorAll('.cleartable-btn');
const modalClearDataAssessmentClose = document.getElementById('modalClearDataAssessmentClose');

modalClearDataAssessmentOpen.forEach(button => {
    button.addEventListener('click', () => {
        modalClearDataAssessment.classList.remove('hidden');

        const deleteButton = document.getElementById('modalClearTableButtonDataAssessment');
        deleteButton.addEventListener('click', () => {
            confirmClearTablePenilaian();
        });
    });
});


modalClearDataAssessmentClose.addEventListener('click', () => {
    modalClearDataAssessment.classList.add('hidden');
});

// FUNCTION CLEAR TABLE
function confirmClearTablePenilaian() {
    fetch("dataassessment/clearprocess", {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            window.location.href = "dataassessment"
        } else {
            pass
        }
    })
    .catch(error => {
        // Kesalahan dalam melakukan permintaan, lakukan sesuatu jika perlu
        console.error("Terjadi kesalahan:", error);
    });
}

// FUNCTION EDIT
function showEditAssessment(id) {
    window.location.href = "dataassessment/editdata/" + id;
}