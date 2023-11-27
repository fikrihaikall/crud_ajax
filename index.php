<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="public/css/style.css">
</head>
<style>
   div:where(.swal2-container) div:where(.swal2-actions) {
      gap: 1rem !important;
   }
</style>
<body>
   <?php include './table.php' ?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<script>
   $(document).ready( function () {
      $('#myTable').DataTable( {
         ajax: {
            'url' : 'ajax/ajax_mahasiswa.php',
            'type' : 'post',
            'dataSrc' : ''
         },
         columns: [
            { 
               data: null,
               "render": function (data, type, row, meta) {
                  return meta.row + 1;
               },
               "className": "text-center"
            },
            { 
               data: 'NAMA',
               "className": "text-center" 
            },
            { 
               data: 'NPM',
               "className": "text-center" 
            },
            { 
               data: 'KELAS',
               "className": "text-center" 
            },
            { 
               data: null,
               "className": "text-center",
               "render": function (data, type, row, meta) {
                  // console.log(data.ID);
                  var action = `
                     <div class="d-inline p-2">
                        <button class="btn update" title="Update" data-bs-toggle="modal" data-bs-target="#editModal" data-id="${data.ID}" data-nama="${data.NAMA}" data-npm="${data.NPM}" data-kelas="${data.KELAS}">
                           <i class="bi bi-pencil-square" style="font-size: 25px; background-color: palegreen; color: green; padding: 3px; border-radius: 10px;"></i>
                        </button>
                        <button class="btn delete" title="Delete" data-id="${data.ID}">
                           <i class="bi bi-trash" style="font-size: 25px; background-color: bisque; color: red; padding: 3px; border-radius: 10px;"></i>
                        </button>
                     </div>
                  `;
                  return action;
               }
            }
         ],
         "rowCallback": function(row, data, index) {
            // Dapat digunakan untuk memodifikasi setiap baris setelah di-render
            // Misalnya, menambahkan kelas CSS, dll.
         }
      } );
   } );

   $('#btnAdd').click(function() {
      var data = $('#add').serialize();

      $.ajax({
         type: 'post',
         url: 'ajax/ajax_mahasiswa_add.php',
         data: data,
         success: function (res) {
            // console.log(res);
            Swal.fire({
               title: 'Success!',
               text: 'Add Success',
               icon: 'success',
               confirmButtonText: 'OK'
            });
         },
         error: function (err) {
            // console.log(err);
            Swal.fire({
               title: 'Error!',
               text: 'Add Failed',
               icon: 'error',
               confirmButtonText: 'Try Again'
            });
         },
         complete: function (result) {
            $('#btnAdd').hide();
            setTimeout(function() {
               location.reload();
            }, 3000);
         }
      });
   })

   $('#myTable').on('click', '.update', function () {
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var npm = $(this).data('npm');
      var kelas = $(this).data('kelas');

      $('#id_ed').val(id);
      $('#nama_ed').val(nama);
      $('#npm_ed').val(npm);
      $('#kelas_ed').val(kelas);
   })

   $('#btnEdit').click(function() {
      var data = $('#edit').serialize();

      $.ajax({
         type: 'post',
         url: 'ajax/ajax_mahasiswa_edit.php',
         data: data,
         success: function (res) {
            // console.log(res);
            Swal.fire({
               title: 'Success!',
               text: 'Edit Success',
               icon: 'success',
               confirmButtonText: 'OK'
            });
         },
         error: function (err) {
            // console.log(err);
            Swal.fire({
               title: 'Error!',
               text: 'Edit Failed',
               icon: 'error',
               confirmButtonText: 'Try Again'
            });
         },
         complete: function (result) {
            $('#btnEdit').hide();
            setTimeout(function() {
               location.reload();
            }, 3000);
         }
      });
   })

   $('#myTable').on('click', '.delete', function() {
      var data_id = $(this).data('id');
      // console.log(data_id);
      
      const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
            confirmButton: "btn btn-success mr-2",
            cancelButton: "btn btn-danger"
         },
         buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
         title: "Are you sure?",
         text: "You won't be able to revert this!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Yes, delete it!",
         cancelButtonText: "No, cancel!",
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               type: 'post',
               url: 'ajax/ajax_mahasiswa_delete.php',
               data: { id : data_id },
               success: function (res) {
                  // console.log(res);
                  swalWithBootstrapButtons.fire({
                     title: "Deleted!",
                     text: "Data has been deleted.",
                     icon: "success"
                  });
               },
               error: function (err) {
                  // console.log(err);
                  // Swal.fire({
                  //    title: 'Error!',
                  //    text: 'Delete Failed',
                  //    icon: 'error',
                  //    confirmButtonText: 'Try Again'
                  // });
               },
               complete: function (result) {
                  // $('#btnAdd').hide();
                  setTimeout(function() {
                     location.reload();
                  }, 3000);
               }
            });
         } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
         ) {
            swalWithBootstrapButtons.fire({
               title: "Cancelled",
               text: "Data is safe :)",
               icon: "error"
            });
         }
      });
   });

</script>