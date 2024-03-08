<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-info mb-3" style="border-top-width: 4px;">
                <h1 class="mt-2">Logbook</h1>
                <a href="/logbook/create" class="btn btn-primary mb-3" style="width: 10rem;">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($logbook as $LB) : ?>
                            <tr>
                                <th scope="id"><?= $i++; ?></th>
                                <td><?= $LB['tanggal']; ?></td>
                                <td><?= $LB['kegiatan']; ?></td>
                                <td>
                                    <!-- <a href="/logbook/<?= $LB['id']; ?>" class="btn btn-success">Verifikasi</a> -->

                                    <form action="/logbook/<?= $LB['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Delete</button>
                                    </form>
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