<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 400px;">
                <div class="row g-0">
                    <h2 class="mt-2">Detail Kelompok</h2>

                    <div class="col-md-8">
                        <div class="card-body">

                            <p class="card-text"><b>Nama :</b> <?= $kelompok['nama']; ?></p>
                            <p class="card-text"><b>NIM :</b> <?= $kelompok['nim']; ?></p>
                            <p class="card-text"><b>Kelas :</b> <?= $kelompok['kelas']; ?></p>
                            <p class="card-text"><b>Kelompok :</b> <?= $kelompok['kelompok']; ?></p>


                            <!-- <a href="/kelompok/edit/<?= $kelompok['id']; ?>" class="btn btn-warning">Edit</a> -->

                            <form action="/kelompok/<?= $kelompok['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Delete</button>
                                <a href="/kelompok/index/" class="btn btn-success">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>