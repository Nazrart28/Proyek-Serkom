<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data</h2>
            <form action="/logbook/update/<?= $logbook['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $logbook['id']; ?>">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $logbook['tanggal'] ?>">
                </div>
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="<?= (old('kegiatan')) ? old('kegiatan') : $logbook['kegiatan'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>