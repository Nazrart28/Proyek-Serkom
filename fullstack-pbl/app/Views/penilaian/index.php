<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-info mb-3 " style="border-top-width: 4px;">
                <h1 class="mt-2">Form Penilaian</h1>
                <a href="/penilaian/create" class="btn btn-success mb-3" style="width: 7rem;">Input Nilai</a>
                <a href="/penilaian/cetak" class="btn btn-primary float-right" style="width: 7rem;">Cetak</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">UTS</th>
                            <th scope="col">UAS</th>
                            <th scope="col">Nilai Akhir</th>
                            <th scope="col">Skala</th>
                            <th scope="col">Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($Penilaian as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['nim']; ?></td>
                                <td><?= $p['nama_mhs']; ?></td>
                                <td><?= $p['uts']; ?></td>
                                <td><?= $p['uas']; ?></td>
                                <td><?= $p['nilai_akhir']; ?></td>
                                <td>
                                    <?= $p['skala']; ?>
                                    <?php
                                    if ('nilai_akhir' > 90) {
                                        echo ('4.0');
                                    } elseif ('nilai_akhir' < 89) {
                                        echo ('3.9');
                                    } else {
                                        echo ('3.2');
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $p['huruf']; ?>
                                    <?php
                                    if ('skala' >= 4.0) {
                                        echo ('A');
                                    } elseif ('skala' < 3.9) {
                                        echo ('B');
                                    } else {
                                        echo ('C');
                                    }
                                    ?>
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