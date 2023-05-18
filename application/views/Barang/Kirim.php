<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="list-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="list-group-item" id="nama" name="nama" value="<?= set_value('nama'), $barang['nama'] ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <input type="hidden" name="id" value="<?= $barang['id'] ?>">
                <input type="hidden" name="sisaJumlah" value="<?= $barang['jumlah'] ?>">
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah') ?>">
                    <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="toko">Pilih Toko</label>
                    <select class="form-control" id="toko" name="toko_id">
                        <?php foreach ($toko as $t) : ?>
                            <option value="<?= $t['nama_toko'] ?>"><?= $t['nama_toko'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Pesan</label>
                    <input id="x" type="hidden" name="pesan" value="<?= set_value('pesan') ?>">
                    <trix-editor input="x"></trix-editor>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->