<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<style>
    body {
    background-color: #f0f2f5; /* Light grey background */
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; /* A font similar to the image */
}

.card {
    border-radius: 0.75rem; /* Slightly rounded corners for the card */
    border: none; /* No border for the card */
}

.input-group .form-control,
.btn {
    border-radius: 0.5rem; /* Rounded input and button corners */
}

.input-group .form-control {
    border-right: none; /* Remove border between input and icon */
}

.input-group .input-group-text {
    background-color: white;
    border-left: none; /* Remove border between input and icon */
    border-top-right-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
    color: #6c757d; /* Grey icon color */
}

.form-select {
    border-radius: 0.5rem;
}

.btn-light {
    background-color: #f8f9fa; /* Lighter background for light buttons */
    border-color: #e9ecef; /* Lighter border */
    color: #495057; /* Darker text */
}

.btn-primary {
    background-color: #6f42c1; /* Purple similar to the image */
    border-color: #6f42c1;
    border-radius: 0.5rem;
}

.btn-primary:hover {
    background-color: #5a369e; /* Darker purple on hover */
    border-color: #5a369e;
}

/* Table specific styles */
.table thead th {
    background-color: #ffffff; /* White header background */
    color: #6c757d; /* Grey header text */
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    padding-top: 1rem;
    padding-bottom: 1rem;
    vertical-align: middle;
}

.table tbody tr {
    border-bottom: 1px solid #e9ecef; /* Light border between rows */
}

.table tbody tr:last-child {
    border-bottom: none; /* No border for the last row */
}

.table tbody td {
    vertical-align: middle;
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.table img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 0.25rem;
}

.table h6 {
    font-size: 0.95rem;
    margin-bottom: 0.1rem;
    color: #343a40;
}

.table small {
    font-size: 0.75rem;
    color: #6c757d;
}

/* Category Badges */
.badge.bg-light {
    background-color: #e9ecef !important; /* Lighter grey for category badges */
    color: #495057 !important; /* Darker text for category badges */
    padding: 0.5em 0.8em;
    border-radius: 0.3rem;
    font-size: 0.75rem;
}

/* Status Badges */
.badge.bg-success {
    background-color: #e0f7fa !important; /* Light teal for 'Publish' */
    color: #00796b !important;
    padding: 0.5em 0.8em;
    border-radius: 0.3rem;
    font-size: 0.75rem;
}

.badge.bg-warning {
    background-color: #fffde7 !important; /* Light yellow for 'Scheduled' */
    color: #fbc02d !important;
    padding: 0.5em 0.8em;
    border-radius: 0.3rem;
    font-size: 0.75rem;
}

.badge.bg-danger {
    background-color: #ffebee !important; /* Light red for 'Inactive' */
    color: #d32f2f !important;
    padding: 0.5em 0.8em;
    border-radius: 0.3rem;
    font-size: 0.75rem;
}

/* Switch (Stock column) */
.form-switch .form-check-input {
    width: 2.5em; /* Adjust width */
    height: 1.4em; /* Adjust height */
    background-color: #e9ecef; /* Off state background */
    border-color: #e9ecef;
}

.form-switch .form-check-input:checked {
    background-color: #6f42c1; /* Purple when checked */
    border-color: #6f42c1;
}

/* Pagination */
.pagination .page-link {
    border-radius: 0.5rem;
    margin: 0 0.2rem;
    color: #6f42c1; /* Purple text for links */
    border-color: #e9ecef; /* Light border */
}

.pagination .page-item.active .page-link {
    background-color: #6f42c1; /* Purple background for active page */
    border-color: #6f42c1;
    color: white;
}

.pagination .page-link:hover {
    background-color: #f0f2f5; /* Light background on hover */
    color: #6f42c1;
}

.pagination .page-item.disabled .page-link {
    color: #adb5bd; /* Grey for disabled links */
    pointer-events: none;
    background-color: #ffffff;
    border-color: #e9ecef;
}

/* Floating Buy Now button */
.btn-danger.rounded-pill {
    background-color: #fd7e14; /* Orange color */
    border-color: #fd7e14;
    padding: 1rem 1.5rem;
    font-size: 1.1rem;
}

.btn-danger.rounded-pill:hover {
    background-color: #e06200; /* Darker orange on hover */
    border-color: #e06200;
}

/* General UI adjustments */
.dropdown-menu {
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
}

.dropdown-item i {
    width: 1.2em; /* Align icons nicely */
}
</style>
</head>
<body>

    <div class="container-fluid mt-4">
        <div class="row mb-3 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Product">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
            <div class="col-md-8 text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <select class="form-select me-2" style="width: auto;">
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                    <div class="dropdown me-2">
                        <button class="btn btn-light dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-upload me-1"></i> Export
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-print me-2"></i> Print</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-csv me-2"></i> Csv</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i> Excel</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2"></i> Pdf</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i> Copy</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Add Product
                    </button>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tbl_productos">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input type="checkbox" class="form-check-input">
                                </th>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">SKU</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">QTY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted" id="dataTablesInfo">
                        </div>
                    <nav aria-label="Page navigation example" id="dataTablesPagination">
                        </nav>
                     <button class="btn btn-danger btn-lg rounded-pill shadow" style="position: fixed; bottom: 20px; right: 20px;">
                        <i class="fas fa-shopping-bag me-2"></i> Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table_producto = $("#tbl_productos").DataTable({
                "ajax": {
                    url: "ajax/productos.ajax.php",
                    dataSrc: '', // Assuming your PHP returns a direct array of product objects
                    type: "POST",
                    data: {
                        'accion': 1
                    }, //1: LISTAR PRODUCTOS
                },
                "columns": [
                    {
                        "data": null, // For the checkbox, not directly from data
                        "orderable": false,
                        "searchable": false,
                        "render": function(data, type, row) {
                            return '<input type="checkbox" class="form-check-input">';
                        }
                    },
                    {
                        "data": null, // For product image, name, and description
                        "render": function(data, type, row) {
                            var imgPath = row.img_producto || 'https://via.placeholder.com/40'; // Fallback image
                            return `
                                <div class="d-flex align-items-center">
                                    <img src="${imgPath}" alt="${row.nombre}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>
                                        <h6 class="mb-0">${row.nombre}</h6>
                                        <small class="text-muted">${row.descripcion_producto}</small>
                                    </div>
                                </div>
                            `;
                        }
                    },
                    {
                        "data": "nombre_categoria", // Category
                        "render": function(data, type, row) {
                            // You can add logic here to map categories to specific icons if needed
                            let iconClass = '';
                            switch(data.toLowerCase()) {
                                case 'electronica': iconClass = 'fas fa-tv'; break;
                                case 'shoes': iconClass = 'fas fa-shoe-prints'; break;
                                case 'accessories': iconClass = 'fas fa-watches'; break; // Assuming an accessory icon
                                case 'household': iconClass = 'fas fa-house'; break;
                                default: iconClass = 'fas fa-tag'; // Generic tag icon
                            }
                            return `<span class="badge bg-light text-dark p-2"><i class="${iconClass} me-1"></i> ${data}</span>`;
                        }
                    },
                    {
                        "data": "stock_producto", // Stock switch. You might want a separate boolean field for "in stock" if it's not simply stock_producto > 0
                        "render": function(data, type, row) {
                            const isChecked = row.stock_producto > 0 ? 'checked' : ''; // Or use row.lleva_iva_producto if that's your switch
                            return `
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" ${isChecked}>
                                </div>
                            `;
                        }
                    },
                    { "data": "codigo_barra" }, // SKU
                    {
                        "data": "precio_venta_producto", // Price
                        "render": function(data, type, row) {
                            return `$${parseFloat(data).toFixed(2)}`;
                        }
                    },
                    { "data": "stock_producto" }, // QTY (using stock_producto as quantity)
                    {
                        "data": null, // Status badge
                        "render": function(data, type, row) {
                            // Logic for status based on stock, or a dedicated status field if you have one
                            let statusClass = '';
                            let statusText = '';

                            if (row.stock_producto > 10) { // Example: High stock = Publish
                                statusClass = 'bg-success';
                                statusText = 'Publish';
                            } else if (row.stock_producto > 0 && row.stock_producto <= 10) { // Example: Low stock = Scheduled
                                statusClass = 'bg-warning text-dark';
                                statusText = 'Scheduled';
                            } else { // Example: Out of stock = Inactive
                                statusClass = 'bg-danger';
                                statusText = 'Inactive';
                            }
                            // If you have a 'status_producto' field, use it:
                            // if (row.status_producto === 'published') { statusClass = 'bg-success'; statusText = 'Publish'; }
                            // else if (row.status_producto === 'scheduled') { statusClass = 'bg-warning text-dark'; statusText = 'Scheduled'; }
                            // else { statusClass = 'bg-danger'; statusText = 'Inactive'; }

                            return `<span class="badge ${statusClass}">${statusText}</span>`;
                        }
                    },
                    {
                        "data": null, // Actions buttons
                        "orderable": false,
                        "searchable": false,
                        "render": function(data, type, row) {
                            // You can include the row.id_producto in data attributes for click handlers
                            return `
                                <button class="btn btn-light btn-sm me-1 btn-edit-product" data-id="${row.id_producto}"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-light btn-sm btn-more-actions" data-id="${row.id_producto}"><i class="fas fa-ellipsis-v"></i></button>
                            `;
                        }
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Spanish language pack
                },
                "pagingType": "simple_numbers", // For next/previous with numbers
                "dom": '<"top"f>rt<"bottom"lip><"clear">', // Custom DOM to control elements (f=filter, r=processing, t=table, i=info, l=length, p=pagination)
                "initComplete": function(settings, json) {
                    // Move the default DataTables search input to the custom search box
                    $('#tbl_productos_filter').hide(); // Hide default DataTables search
                    $('input[placeholder="Search Product"]').on('keyup', function() {
                        table_producto.search(this.value).draw();
                    });

                    // Hide default DataTables length change and pagination if you want to use custom ones
                    $('#tbl_productos_length').hide();
                    $('#tbl_productos_info').appendTo('#dataTablesInfo'); // Move info to custom div
                    $('#tbl_productos_paginate').appendTo('#dataTablesPagination'); // Move pagination to custom div

                     // Handle the custom "Show X entries" dropdown
                    $('select.form-select').on('change', function() {
                        table_producto.page.len($(this).val()).draw();
                    });
                }
            });
        });
    </script>
</body>
</html>