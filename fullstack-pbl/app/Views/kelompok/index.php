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
                <h1 class="mt-3">Pembagian kelompok</h1>
                <a href="/kelompok/create" class="btn btn-primary mb-3" style="width: 10rem;">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Kelompok</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kelompok as $k) : ?>
                            <tr>
                                <th scope="id"><?= $i++; ?>
                                <td><?= $k['nama']; ?></td>
                                <td><?= $k['nim']; ?></td>
                                <td><?= $k['kelas']; ?></td>
                                <td><?= $k['kelompok']; ?></td>
                                <td>
                                    <a href="/kelompok/<?= $k['id'];
                                                        $k['kelompok']; ?>" class="btn btn-success">Detail</a>
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