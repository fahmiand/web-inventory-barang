<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <?= $this->session->flashdata('message') ?>
    <a href="<?= base_url('barang/cetakin') ?>" class="btn btn-warning mb-2">Export Pdf</a>
    <a href="<?= base_url('barang/tambah') ?>" class="btn btn-success mb-2">Tambah Barang</a>
    <div class="row">
        <div class="col-lg">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Bukti</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($barangMasuk as $bm) :
                            $i++ ?>
                            <tr>
                                <th><?= $i ?></th>
                                <td><?= $bm['nama'] ?></td>
                                <td><?= $bm['jumlah'] ?> Carton</td>
                                <td><?= $bm['ket'] ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/barang/') . $bm['bukti'] ?>" width="100">
                                </td>
                                <td><?= gmdate('d F Y | H:i:s', $bm['date']) ?></td>
                                <td>
                                    <form action="hapus" method="post">
                                        <input type="hidden" name="id" value="<?= $bm['id'] ?>">
                                        <input type="hidden" name="nama" value="<?= $bm['bukti'] ?>">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <a href="<?= base_url('barang/edit/') . $bm['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('barang/kirim/') . $bm['id'] ?>" class="btn btn-dark">Kirim</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->