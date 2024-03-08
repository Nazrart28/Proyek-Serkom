<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Logbook</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <!--  
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><b>Tanggal :</b> <?= $logbook['tanggal']; ?></p>
                            <p class="card-text"><b>Kegiatan :</b> <?= $logbook['kegiatan']; ?></p>

                            <a href="/logbook/index/<?= $logbook['id']; ?>" class="btn btn-success">Yes</a>
                            <a href="/logbook/index/<?= $logbook['id']; ?>" class="btn btn-danger">No</a>
                            <br><br>
                            <a href="/logbook/index">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>