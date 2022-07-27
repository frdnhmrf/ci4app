<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Agenda Baru</h2>
            <form action="/agenda/update/<?= $agenda['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $agenda['slug']; ?>">
                <input type="hidden" name="fileLama" value="<?= $agenda['gambar']; ?>">
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ""; ?>" id="name" name="name" autofocus value="<?= (old('name')) ? old('name') : $agenda['name']  ?>">
                        <div id="name" class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ""; ?>" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $agenda['deskripsi']  ?>">
                        <div id="name" class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $agenda['gambar']; ?>" class="img-thumbnail img-preview">
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
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ""; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $agenda['tanggal']  ?>">
                        <div id="name" class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>