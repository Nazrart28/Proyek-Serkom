<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="card border-info mb-3" style="border-top-width: 4px;">
                <h1 class="mt-3">Pembagian Mitra</h1>
                <a href="/mitra/create" class="btn btn-primary mb-3" style="width: 10rem;">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">No</th>
                            <th scope="col">Mitra</th>
                            <th scope="col">Proyek</th>
                            <th scope="col">kelompok</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitra as $m) : ?>
                            <tr>
                                <th scope="id"><?= $i++; ?>
                                <td><?= $m['mitra']; ?></td>
                                <td><?= $m['proyek']; ?></td>
                                <td><?= $m['kelompok']; ?></td>
                                <td>
                                    <a href="/mitra/<?= $m['id']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>