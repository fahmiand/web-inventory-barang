<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $role['id'] ?>">
                    <label for="role">Role Name</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?= $role['role'] ?>">
                    <?php if (validation_errors()) : ?>
                        <small id="emailHelp" class="form-text text-muted"><?php validation_errors() ?></small>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-outline-success">Ubah role</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->