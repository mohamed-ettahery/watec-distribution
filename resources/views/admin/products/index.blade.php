@extends('admin/layout')
@section('page')
    les produits
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('products.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter un nouveau produit</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les Produits</h2>
        </div>
        <div class='card-body'>
            <table class="table table-responsive" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col" style="width: 22%;">Nom</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Marque</th>
                        {{-- <th scope="col" style="width: 22%;">Date de création</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 22%;"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var dataTable = $('#myTable').DataTable({
                serverSide: true,
                ajax: '/get-products',
                columns: [{
                        data: "id",
                        render: function(data) {
                            return `<td><span class="d-inline-block pt-td" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="${data}">${data}</span></td>`;
                        }
                    },
                    {
                        data: "image",
                        render: function(data, type, full, meta) {
                            var imageName = data.split(',')[0];
                            var imagePath = "{{ asset('uploads/products/') }}/" + imageName;
                            return '<img src="' + imagePath +
                                '" alt="Product Image" width="50" height="50">';
                        }
                    },
                    {
                        data: "name",
                        render: function(data) {
                            return `<td><span class="d-inline-block pt-td limit-string" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="${data}">${data}</span></td>`;
                        }
                    },
                    {
                        data: "category.name",
                        render: function(data) {
                            return `<td><span class="d-inline-block pt-td" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="${data}">${data}</span></td>`;
                        }
                    },
                    {
                        data: "mark.name",
                        render: function(data, type, full, meta) {
                            if (data && data.trim() !== "") {
                                return `<td><span class="d-inline-block pt-td" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="${data}">${data}</span></td>`;
                            } else {
                                return `<td><span class="d-inline-block pt-td" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="N/A">N/A</span></td>`;
                            }
                        }
                    },
                    {
                        data: "status",
                        render: function(data, type, full, meta) {
                            var productStatus = data; // Store the status value in a variable

                            // Customize the output based on the product status
                            if (productStatus == 1) {
                                return `<div class="pt-td"><span data-dt(${data}) class="badge bg-success">Active</span></div>`;
                            } else {
                                return `<div class="pt-td"><span data-dt(${data}) class="badge bg-danger">Inactive</span></div>`;
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var productId = data.id;
                            var productName = data.name;
                            var productStatus = data.status;

                            // Create the action buttons with appropriate URLs
                            var editUrl = "{{ route('products.edit', ':id') }}".replace(':id',
                                productId);
                            var statusUrl = "{{ route('products.status', ':id') }}".replace(':id',
                                productId);
                            var deleteUrl = "{{ route('products.destroy', ':id') }}".replace(':id',
                                productId);

                            // Set the appropriate button icon and title based on the productStatus
                            var statusIcon = productStatus ? 'fa-eye-slash' : 'fa-eye';
                            var statusTitle = productStatus ? 'masquer le produit' :
                                'activer le produit';

                            // Render the status toggle button
                            var statusButton = `<button type="submit" class="btn btn-primary status-toggle" data-bs-toggle="tooltip" data-bs-placement="top" title="${statusTitle}">
                            <i class="fa-solid ${statusIcon}"></i>
                        </button>`;

                            // Return the HTML for the action buttons
                            return `
                                <form action="${editUrl}" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier produit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </form>
                                <form action="${statusUrl}" method="POST" class="d-inline-block">
                                    @csrf
                                    ${statusButton}
                                </form>
                                <form id="delete-form-${productId}" class="d-inline-block" action="${deleteUrl}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer produit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>`;
                        }
                    }

                ],
                "columnDefs": [{
                        "orderable": false,
                        "targets": [1,3,4]
                    } // Assuming "category" is at index 3 and "mark" is at index 4
                ],
                "autoWidth": true,
                "dom": 'Bfrtip', // Show buttons (B) at the top, the (f)ilter input, (r)esults length, and (p)agination elements, in that order.
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
                // lengthMenu: [10, 25, 50, 100],
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });

            // // Handle status toggle using event delegation
            // $('#myTable').on('click', '.status-toggle', function(e) {
            //     e.preventDefault();
            //     var form = $(this).closest('form');
            //     $.ajax({
            //         url: form.attr('action'),
            //         type: 'POST',
            //         data: form.serialize(),
            //         success: function(response) {
            //             // Update the DataTable to reflect the updated data
            //             dataTable.ajax.reload();
            //         },
            //         error: function(error) {
            //             // Handle error if needed
            //             console.error('Error:', error);
            //         }
            //     });
            // });

            // Handle delete using event delegation
            $('#myTable').on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                if (confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?')) {
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            alert("deleted");
                            // Update the DataTable to reflect the updated data
                            dataTable.ajax.reload();
                        },
                        error: function(error) {
                            // Handle error if needed
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
