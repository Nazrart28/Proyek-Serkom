<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data</h2>
            <form action="/mitra/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="mitra" class="form-label">Mitra</label>
                    <input type="text" class="form-control" id="mitra" name="mitra" value="<?= old('mitra'); ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi mitra" class="form-label">Deskripsi Mitra</label>
                    <textarea class="form-control" <?= ($validation->hasError('deskripsi_mitra')) ? 'is-invalid' : ''; ?> id="deskripsi_mitra" name="deskripsi_mitra" value="<?= old('deskripsi_mitra'); ?>" rows="3"></textarea>
                    <div class="invalid-feedback">
                        Isikan Deskripsi yang belum ada.
                    </div>
                    <div class="mb-3">
                        <label for="proyek" class="form-label">Proyek</label>
                        <input type="text" class="form-control" <?= ($validation->hasError('proyek')) ? 'is-invalid' : ''; ?> id="proyek" name="proyek" value="<?= old('proyek'); ?>">
                        <div class="invalid-feedback">
                            Isikan proyek yang belum ada.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?> id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Isikan Deskripsi yang belum ada.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelompok" class="form-label">Kelompok</label>
                        <input type="text" class="form-control" id="kelompok" name="kelompok" value="<?= old('kelompok'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>