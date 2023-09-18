@extends('layouts.app')
  
@section('title', 'Home Product')

@section('contents')
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

 <!-- DataTables CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

 <!-- DataTables JavaScript -->
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

 <!-- DataTables Buttons JavaScript -->
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

 <!-- DataTables Select -->
 <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
 <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

 <!-- DataTables PDF Export -->
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.pdf.min.js"></script>

 <!-- Add Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


 <style>
     /* Style the export buttons */
     .buttons-html5,
     .buttons-html5:focus,
     .buttons-html5:hover {
         background-color: #007bff !important; /* Use !important to override DataTables' default styles */
         color: #fff !important;
         border: none !important;
         border-radius: 5px !important;
         padding: 10px 20px !important;
         margin-right: 5px !important;
         cursor: pointer !important;
         display: inline-block !important;
         font-size: 14px !important;
         text-align: center !important;
     }

     /* Style the button icons */
     .buttons-html5::before {
         font-family: 'Font Awesome 5 Free'; /* Use the Font Awesome font family */

     }
     .buttons-excel::before {
         font-family: 'Font Awesome 5 Free';

     }
     .buttons-pdf::before {
         font-family: 'Font Awesome 5 Free';

     }

     /* Change the background color on hover */
     .buttons-html5:hover {
         background-color: #0056b3 !important;
     }
 </style>
</head>
<body>
<div class="container mt-5">
 {{-- <h1 class="text-center text-success mb-5"><b>List Product</b></h1> --}}
 <div class="card">
     <div class="card-body">
         <div class="dataTables_length">
             <label>Show entries
                 <select id="pageLengthSelect" class="custom-select custom-select-sm form-control form-control-sm">
                     <option value="10">10</option>
                     <option value="25">25</option>
                     <option value="50">50</option>
                     <option value="-1">All</option>
                 </select>
             </label>
         </div>

         <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
             <thead>
                 <tr>
                     <th class="checkbox-cell">
                         <input type="checkbox" id="selectAll">
                     </th>
                     <th>Manufacture</th>
                     <th>Component Name</th>
                     <th>Application Name</th>
                     <th>Model Type</th>
                     <th>Actions</th> <!-- Tambahkan kolom untuk tombol-tombol -->
                 </tr>
             </thead>
    <tbody>
        @foreach($result as $row)
            <tr>
                <td class="checkbox-cell">
                    <input type="checkbox">
                </td>
                <td>{{ $row->manufac }}</td>
                <td>{{ $row->compoName }}</td>
                <td>{{ $row->applicationName }}</td>
                <td>{{ $row->modelType }}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('oil.show', $row->condemID) }}" type="button" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('oil.edit', $row->condemID)}}" type="button" class="btn btn-warning">Edit</a>
                        <form action="{{ route('oil.destroy', $row->manufac) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </form>
                     </div>
                </td>
            </tr>
        @endforeach
    </tbody>
         </table>
     </div>
 </div>
</div>

<script>

 $(document).ready(function() {
     var table = $('#dataTable').DataTable({
         dom: 'Bfrtip',
         buttons: [
             {
                 extend: 'copyHtml5',
                 text: '<i class="fas fa-copy"></i> Copy',
                 className: 'export-button', // Hapus class 'buttons-html5' dan gantilah dengan 'export-button'
         },
             {
                 extend: 'csvHtml5',
                 text: '<i class="fas fa-file-csv"></i> CSV',
                 className: 'buttons-html5 export-button', // Add your custom class
             },
             {
                 extend: 'excelHtml5',
                 text: '<i class="fas fa-file-excel"></i> Excel',
                 className: 'buttons-html5 export-button', // Add your custom class
             },
             {
                 extend: 'pdfHtml5',
                 text: '<i class="fas fa-file-pdf"></i> PDF',
                 className: 'buttons-html5 export-button', // Add your custom class
             },
             {
                 extend: 'print',
                 text: '<i class="fas fa-print"></i> Print',
                 className: 'buttons-html5 export-button', // Add your custom class
             }
         ],
         pageLength: 10,
         select: {
             style: 'multi',
             selector: 'td:first-child'
         },
         language: {
             paginate: {
                 next: '<i class="fas fa-chevron-right"></i>',
                 previous: '<i class="fas fa-chevron-left"></i>',
             }
         },
         pagingType: 'simple_numbers',
     });

     // Handle page length change
     $('#pageLengthSelect').on('change', function() {
         var selectedValue = $(this).val();
         table.page.len(selectedValue).draw();
     });

     // Check/uncheck all checkboxes
     $('#selectAll').on('change', function() {
         var isChecked = $(this).is(':checked');
         table.rows().select(isChecked);
     });
 });

</script>

@endsection