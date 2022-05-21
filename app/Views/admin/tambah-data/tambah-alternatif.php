<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin/tambah_alternatif') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" required value="Laki-laki"> Laki-laki<br>
                        <input type="radio" name="jenis_kelamin" required value="Perempuan"> Perempuan<br>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ipk</label>
                        <input type="text" name="ipk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pengalaman</label>
                        <input type="text" name="pengalaman" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Test Kemampuan Dasar</label>
                        <input type="text" name="tkd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Wawancara</label>
                        <input type="text" name="wawancara" class="form-control" required>
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