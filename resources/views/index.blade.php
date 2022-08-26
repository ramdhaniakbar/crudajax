<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <title>CRUD Laravel Ajax</title>
</head>

<body>
   <div class="container mt-5">
      <div class="row">
         <div class="col-lg-8">
            <h1>CRUD Dengan JQuery Ajax</h1>
            <button class="btn btn-primary" onClick="create()">+ Tambah Product</button>
            <div id="read" class="mt-3"></div>
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="modalCreate" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modalCreateLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div id="page" class="p-2"></div>
            </div>
         </div>
      </div>
   </div>

   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
   </script>
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

   <script>
      $(document).ready(function () {
         read();
      });
      
      // Read Database
      function read() {
         $.get("{{ url('read') }}", {}, function (data, status) {
            $("#read").html(data);
         })
      }
      
      // Untuk modal create
      function create() {
         $.get("{{ url('create') }}", {}, function (data, status) {
            $("#modalCreateLabel").html("Create Product")
            $("#page").html(data);
            $("#modalCreate").modal("show");
         })
      }

      // Untuk proses create data
      function store() {
         var name = $("#name").val();
         $.ajax({
            type : "get",
            url : "{{ url('store') }}",
            data: "name=" + name,
            success: function (data) {
               $(".btn-close").click();
               read();
            }
         })
      }
      
      // Untuk modal halaman edit show
      function show(id) {
         $.get("{{ url('show') }}/" + id, {}, function (data, status) {
            $("#modalCreateLabel").html("Edit Product")
            $("#page").html(data);
            $("#modalCreate").modal("show");
         })
      }

      // Untuk proses update data
      function update(id) {
         var name = $("#name").val();
         $.ajax({
            type : "get",
            url : "{{ url('update') }}/" + id,
            data: "name=" + name,
            success: function (data) {
               $(".btn-close").click();
               read();
            }
         })
      }

      // Untuk proses destroy data
      function destroy(id) {
         if (!confirm("Apakah yakin untuk hapus data?")) {
            return false;
         }
         $.ajax({
            type : "get",
            url : "{{ url('destroy') }}/" + id,
            data: "name=" + name,
            success: function (data) {
               $(".btn-close").click();
               read();
            }
         })
      }
      
   </script>
</body>

</html>