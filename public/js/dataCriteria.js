
$(document).ready(function() {
    $('#dataCriteria').DataTable({
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

// MODAL
const modalDeleteCriteria = document.querySelector('.modalDeleteCriteria');
const modalDeleteCriteriaOpen = document.querySelectorAll('.datacriteria-delete-btn');
const modalDeleteCriteriaClose = document.getElementById('modalDeleteCriteriaClose');

modalDeleteCriteriaOpen.forEach(button => {
    button.addEventListener('click', () => {
        const id_criteria = button.dataset.id;
        modalDeleteCriteria.classList.remove('hidden');

        const deleteButton = document.getElementById('modalDeleteButtonCriteria');
        deleteButton.addEventListener('click', () => {
            confirmDeleteCriteria(id_criteria);
        });
    });
});

modalDeleteCriteriaClose.addEventListener('click', () => {
    modalDeleteCriteria.classList.add('hidden');
});

// FUNCTION DELETE
function confirmDeleteCriteria(id) {
    fetch("datacriteria/deleteprocess/" + id, {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            window.location.href = "datacriteria";
        } else {
            // Gagal menghapus, lakukan sesuatu jika perlu
            console.error("Gagal menghapus data");
        }
    })
    .catch(error => {
        // Kesalahan dalam melakukan permintaan, lakukan sesuatu jika perlu
        console.error("Terjadi kesalahan:", error);
    });
}


// FUNCTION EDIT
function showEditCriteria(id) {
    window.location.href = "datacriteria/editdata/" + id;
}
