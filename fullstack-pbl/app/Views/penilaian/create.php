<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Penilaian</h2>
            <form action="/penilaian/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="int" class="form-control" id="nim" name="nim" value="<?= old('nim'); ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_mhs" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= old('nama_mhs'); ?>">
                </div>
                <div class="mb-3">
                    <label for="uts" class="form-label">Uts</label>
                    <input type="int" class="form-control" id="uts" name="uts" value="<?= old('uts'); ?>">
                </div>
                <div class="mb-3">
                    <label for="uas" class="form-label">Uas</label>
                    <input type="int" class="form-control" id="uas" name="uas" value="<?= old('uas'); ?>">
                </div>
                <div class="mb-3">
                    <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
                    <input type="int" class="form-control" id="nilai_akhir" name="nilai_akhir" value="<?= old('nilai_akhir'); ?>">
                </div>
                <div class="mb-3">
                    <label for="skala" class="form-label">Skala</label>
                    <input type="int" class="form-control" id="skala" name="skala" value="<?= old('skala'); ?>">
                </div>
                <div class="mb-3">
                    <label for="huruf" class="form-label">Huruf</label>
                    <input type="int" class="form-control" id="huruf" name="huruf" value="<?= old('huruf'); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>