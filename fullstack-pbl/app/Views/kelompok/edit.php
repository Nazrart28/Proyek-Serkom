<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data</h2>
            <form action="/kelompok/update/<?= $kelompok['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $kelompok['id']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $kelompok['nama'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">nim</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= (old('nim')) ? old('nim') : $kelompok['nim'] ?>">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= (old('kelas')) ? old('kelas') : $kelompok['kelas'] ?>">
                </div>
                <div class="mb-3">
                    <label for="kelompok" class="form-label">Kelompok</label>
                    <input type="text" class="form-control <?= ($validation->hasError('kelompok')) ? 'is-invalid' : ''; ?>" id="kelompok" name="kelompok" value="<?= (old('kelompok')) ? old('kelompok') : $kelompok['kelompok'] ?>">
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