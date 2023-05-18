<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <a href="<?= base_url('karyawan/tambahkaryawan') ?>" class="btn btn-success mb-2">Tambah Karyawan</a>
    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($karyawan as $k) :
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $k['name'] ?></td>
                                <td><?= $k['email'] ?></td>
                                <td>
                                    <a href="<?= base_url('karyawan/delete/') . $k['id'] ?>" class="btn btn-danger">Delete</a>
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