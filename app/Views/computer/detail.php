<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail PC</h2>
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/img/<?= $computer['foto']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $computer['vendor']; ?></h5>
                    <p class="card-text"><b>Processor : </b><?= $computer['cpu']; ?></p>
                    <p class="card-text"><b>RAM/Memory : </b><?= $computer['ram']; ?></p>
                    <p class="card-text"><b>Hardisk : </b><?= $computer['hdd']; ?></p>

                    <a href="/computers/edit/<?= $computer['slug']; ?>" class="btn btn-warning">Edit</a>

                    <form action="/computers/<?= $computer['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                    </form>

                    <div class="row mt-3 ml-1">
                        <a href="/computers">Kembali ke daftar PC</a>
                    </div>


                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>