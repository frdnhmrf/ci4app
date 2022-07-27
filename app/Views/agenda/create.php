<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Agenda Baru</h2>
            <form action="/agenda/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ""; ?>" id="name" name="name" autofocus value="<?= old('name'); ?>">
                        <div id="name" class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input class="form-control custom-file-input  <?= ($validation->hasError('gambar')) ? 'is-invalid' : ""; ?>" value="<?= old('gambar'); ?>" type="file" onchange="imgPreview()" id="gambar" name="gambar">
                            <div id="name" class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Agenda</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ""; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                        <div id="name" class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>