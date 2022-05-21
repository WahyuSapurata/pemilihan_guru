<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Donatur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/tambah_kriteria') ?>">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
          </div>
         <div class="form-group">
          <label>Nama Kriteria</label>
          <input type="text" name="nama_kriteria" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Atribut</label>
          <select name="atribut" class="form-control" required>
              <option>-- Pilih --</option>
              <option value="Benefit">Benefit</option>
              <option value="Cost">Cost</option>
          </select>
        </div>
        <div class="form-group">
          <label>Bobot</label>
          <input type="number" name="bobot" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>