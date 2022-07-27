<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-3">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $agenda['gambar']; ?>" class="img-fluid rounded-start" alt="loading">
                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $agenda['name']; ?></h5>
                            <p class="card-text"><?= $agenda['deskripsi'] ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                            <a href="/agenda/edit/<?= $agenda['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/agenda/<?= $agenda['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')" ;>Hapus</button>
                            </form>
                            <br><br>

                            <a href="/agenda" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>