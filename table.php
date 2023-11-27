<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <div class="mb-2">
               <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">ADD</button>
            </div>
            <table id="myTable" class="table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>NPM</th>
                     <th>Kelas</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody></tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #C3EDC0 !important;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Add Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="add">
            <div>
               <label for="nama" class="form-label">Nama</label>
               <input type="text" name="nama" id="nama" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
            <div class="mb-2">
               <label for="npm" class="form-label">NPM</label>
               <input type="text" name="npm" id="npm" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
            <div class="mb-2">
               <label for="kelas" class="form-label">Kelas</label>
               <input type="text" name="kelas" id="kelas" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btnAdd" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #C3EDC0 !important;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="edit">
            <input type="hidden" name="id" id="id_ed">
            <div>
               <label for="nama_ed" class="form-label">Nama</label>
               <input type="text" name="nama" id="nama_ed" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
            <div class="mb-2">
               <label for="npm_ed" class="form-label">NPM</label>
               <input type="text" name="npm" id="npm_ed" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
            <div class="mb-2">
               <label for="kelas_ed" class="form-label">Kelas</label>
               <input type="text" name="kelas" id="kelas_ed" class="form-control" style="background-color: #E9FFC2; !important">
            </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btnEdit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>