<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-info mb-3" style="border-top-width: 4px;">
                <h1 class="mt-2">Submit File</h1>
                <a href="/submit_file/create" class="btn btn-primary mb-3" style="width: 10rem;">Submit</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">File</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($SubmitFile as $sf) : ?>
                            <tr>
                                <th scope="id"><?= $i++; ?></th>

                                <td><?= $sf['nama_file']; ?></td>
                                <td><?= $sf['file']; ?></td>
                                <td>
                                    <a href="/submit_file/<?= $sf['id']; ?>" class="btn btn-success">Unduh</a>

                                    <form action="/submit_file/<?= $sf['id']; ?>" method="post" class="d-inline">
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