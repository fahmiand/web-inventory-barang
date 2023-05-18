<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('barang/tambah'); ?>
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah') ?>">
                <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group mt-3">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image') ?>">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input id="x" type="hidden" name="ket" value="<?= set_value('ket') ?>">
                <trix-editor input="x"></trix-editor>
                <?= form_error('ket', '<small class="text-danger">', '</small>') ?>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->