<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nomer</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($barangKeluar as $bk) :
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $bk['nama'] ?></td>
                                <td><?= $bk['jumlah'] ?></td>
                                <td><?= $bk['pesan'] ?></td>
                                <td><?= date('d F Y | H:i:s', $bk['date_out']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->