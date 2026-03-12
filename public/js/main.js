// JavaScript for table pagination and search functionality

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all tables with pagination and search
    const tables = document.querySelectorAll('table.table');
    tables.forEach(table => {
        if (table.id) {
            initializeTable(table.id);
        }
    });
});

function initializeTable(tableId) {
    const table = document.getElementById(tableId);
    if (!table) return;

    // Create search and pagination controls if they don't exist
    const tableContainer = table.closest('.table-container') || table.parentElement;
    
    // Don't initialize if already has pagination controls
    if (tableContainer.querySelector('.table-controls')) {
        return;
    }

    // Create controls container
    const controlsContainer = document.createElement('div');
    controlsContainer.className = 'table-controls mb-3';
    
    // Create search input
    const searchContainer = document.createElement('div');
    searchContainer.className = 'mb-2';
    searchContainer.innerHTML = `
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control" id="search-${tableId}" placeholder="جستجو...">
        </div>
    `;
    
    // Create pagination controls
    const paginationContainer = document.createElement('div');
    paginationContainer.className = 'd-flex justify-content-between align-items-center';
    paginationContainer.innerHTML = `
        <div class="d-flex align-items-center gap-2">
            <label class="form-label mb-0">تعداد نمایش:</label>
            <select class="form-select form-select-sm" id="page-size-${tableId}" style="width: auto;">
                <option value="10">10</option>
                <option value="20" selected>20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mb-0" id="pagination-${tableId}">
            </ul>
        </nav>
    `;

    controlsContainer.appendChild(searchContainer);
    controlsContainer.appendChild(paginationContainer);
    
    // Insert controls before table
    tableContainer.insertBefore(controlsContainer, table);

    // Initialize functionality
    setupTableFunctionality(tableId);
}

function setupTableFunctionality(tableId) {
    const table = document.getElementById(tableId);
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById(`search-${tableId}`);
    const pageSizeSelect = document.getElementById(`page-size-${tableId}`);
    const pagination = document.getElementById(`pagination-${tableId}`);
    
    let currentPage = 1;
    let pageSize = parseInt(pageSizeSelect.value);
    let filteredData = [];
    let allRows = Array.from(tbody.querySelectorAll('tr'));

    function updateTable() {
        // Get search term
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        // Filter data
        if (searchTerm === '') {
            filteredData = [...allRows];
        } else {
            filteredData = allRows.filter(row => {
                const text = row.textContent.toLowerCase();
                return text.includes(searchTerm);
            });
        }

        // Calculate pagination
        const totalPages = Math.ceil(filteredData.length / pageSize);
        currentPage = Math.min(currentPage, totalPages) || 1;

        // Show/hide rows
        allRows.forEach((row, index) => {
            const isVisible = filteredData.includes(row);
            const isInRange = isVisible && 
                index >= (currentPage - 1) * pageSize && 
                index < currentPage * pageSize;
            
            row.style.display = isInRange ? '' : 'none';
        });

        // Update pagination
        updatePagination(totalPages);
        
        // Update info text
        updateInfoText(filteredData.length);
    }

    function updatePagination(totalPages) {
        pagination.innerHTML = '';
        
        // Previous button
        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>`;
        prevLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                updateTable();
            }
        });
        pagination.appendChild(prevLi);

        // Page numbers
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);

        for (let i = startPage; i <= endPage; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === currentPage ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                updateTable();
            });
            pagination.appendChild(li);
        }

        // Next button
        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>`;
        nextLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                updateTable();
            }
        });
        pagination.appendChild(nextLi);
    }

    function updateInfoText(totalItems) {
        const infoText = document.createElement('small');
        infoText.className = 'text-muted';
        infoText.textContent = `نمایش ${Math.min((currentPage - 1) * pageSize + 1, totalItems)} تا ${Math.min(currentPage * pageSize, totalItems)} از ${totalItems} مورد`;
        
        // Remove existing info text
        const existingInfo = pagination.parentElement.querySelector('.text-muted');
        if (existingInfo) {
            existingInfo.remove();
        }
        
        // Add new info text
        pagination.parentElement.appendChild(infoText);
    }

    // Event listeners
    searchInput.addEventListener('input', () => {
        currentPage = 1;
        updateTable();
    });

    pageSizeSelect.addEventListener('change', () => {
        pageSize = parseInt(pageSizeSelect.value);
        currentPage = 1;
        updateTable();
    });

    // Initial update
    updateTable();
}

// Export functions for global use if needed
window.initializeTable = initializeTable;
window.setupTableFunctionality = setupTableFunctionality;