<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data</h2>
            <form action="/mitra/update/<?= $mitra['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $mitra['id']; ?>">
                <div class="mb-3">
                    <label for="mitra" class="form-label">Mitra</label>
                    <input type="text" class="form-control" id="mitra" name="mitra" value="<?= (old('mitra')) ? old('mitra') : $mitra['mitra'] ?>">
                </div>
                <div class="mb-3">
                    <label for="proyek" class="form-label">Proyek</label>
                    <input type="text" class="form-control" id="proyek" name="proyek" value="<?= (old('proyek')) ? old('proyek') : $mitra['proyek'] ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $mitra['deskripsi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="kelompok" class="form-label">Kelompok</label>
                    <input type="text" class="form-control <?= ($validation->hasError('kelompok')) ? 'is-invalid' : ''; ?>" id="kelompok" name="kelompok" value="<?= (old('kelompok')) ? old('kelompok') : $mitra['kelompok'] ?>">
                    <div class="invalid-feedback">
                        Isikan nomor kelompok dengan benar.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>