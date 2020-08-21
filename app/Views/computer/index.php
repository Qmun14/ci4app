<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Data PC</h1>
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Vendor</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($computer as $com): ?>
                <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><img src="/img/<?= $com['foto']; ?>" alt="" class="foto"></td>
                <td><?= $com['vendor']; ?></td>
                <td>
                    <a href="" class="btn btn-success">Detail</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>