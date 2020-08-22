<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="section">
<div class="container justify-content-center">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data PC</h2>
            <form action="/computers/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="vendor" class="col-sm-2 col-form-label">Vendor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="vendor" name="vendor" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpu" class="col-sm-2 col-form-label">Processor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="cpu" name="cpu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ram" class="col-sm-2 col-form-label">Memory/RAM</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ram" name="ram">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hdd" class="col-sm-2 col-form-label">Hardisk</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="hdd" name="hdd">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="foto" name="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>

        </div>    
    </div>
</div>
</div>

<?= $this->endSection(); ?>