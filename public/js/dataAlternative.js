// TABLE ALTERNATIVE
$(document).ready(function() {
    $('#dataAlternative').DataTable({
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
const modalDeleteAlternative = document.querySelector('.modalDeleteAlternative');
const modalDeleteAlternativeOpen = document.querySelectorAll('.delete-btn');
const modalDeleteAlternativeClose = document.getElementById('modalDeleteAlternativeClose');

modalDeleteAlternativeOpen.forEach(button => {
    button.addEventListener('click', () => {
        const id_alternative = button.dataset.id;
        modalDeleteAlternative.classList.remove('hidden');

        const deleteButton = document.getElementById('modalDeleteButtonAlternative');
        deleteButton.addEventListener('click', () => {
            confirmDeleteAlternative(id_alternative);
        });
    });
});

modalDeleteAlternativeClose.addEventListener('click', () => {
    modalDeleteAlternative.classList.add('hidden');
});


// FUNCTION DELETE
function confirmDeleteAlternative(id) {
    fetch("dataalternative/deleteprocess/" + id, {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            window.location.href = "dataalternative"
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
function showEditAlternative(id) {
    window.location.href = "dataalternative/editdata/" + id;
}