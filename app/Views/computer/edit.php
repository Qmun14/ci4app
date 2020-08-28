<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="section">
<div class="container justify-content-center">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data PC</h2>
            <form action="/computers/update/<?= $computer['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $computer['slug']; ?>">
                <div class="form-group row">
                    <label for="vendor" class="col-sm-2 col-form-label">Vendor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('vendor')) ? 'is-invalid' : ''; ?>" id="vendor" name="vendor" autofocus value="<?= (old('vendor')) ? old('vendor') : $computer['vendor'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('vendor'); ?>
                    </div>    
                </div>
                </div>
                <div class="form-group row">
                    <label for="cpu" class="col-sm-2 col-form-label">Processor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="cpu" name="cpu" value="<<?= (old('cpu')) ? old('cpu') : $computer['cpu'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ram" class="col-sm-2 col-form-label">Memory/RAM</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ram" name="ram" value="<?= (old('ram')) ? old('ram') : $computer['ram'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hdd" class="col-sm-2 col-form-label">Hardisk</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="hdd" name="hdd" value="<?= (old('hdd')) ? old('hdd') : $computer['hdd'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="foto" name="foto" value="<?= (old('foto')) ? old('foto') : $computer['foto'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>

        </div>    
    </div>
</div>
</div>

<?= $this->endSection(); ?>