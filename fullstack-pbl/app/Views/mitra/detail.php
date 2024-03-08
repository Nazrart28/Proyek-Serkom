<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 960px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><b>Mitra :</b> <?= $mitra['mitra']; ?></p>
                            <p class="card-text"><b>Deskripsi Mitra :</b> <?= $mitra['deskripsi_mitra']; ?></p>
                            <p class="card-text"><b>Proyek :</b> <?= $mitra['proyek']; ?></p>
                            <p class="card-text"><b>Deskripsi :</b> <?= $mitra['deskripsi']; ?></p>
                            <p class="card-text"><b>Kelompok :</b> <?= $mitra['kelompok']; ?></p>
                            <a href="/mitra/edit/<?= $mitra['id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/mitra/<?= $mitra['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Delete</button>
                                <a href="/mitra/index/" class="btn btn-success">Back</a>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>