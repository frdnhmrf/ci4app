<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/agenda/create" class="btn btn-primary mt-3">New Agenda</a>
            <h2 class="mt-3">Daftar Agenda</h2>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashData('hapus'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($agenda as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['name']; ?> </td>
                            <td><img src="/img/<?= $a['gambar']; ?>" class="imgIndex"> </td>
                            <td><?= $a['tanggal']; ?></td>
                            <td><a href="/agenda/<?= $a['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>