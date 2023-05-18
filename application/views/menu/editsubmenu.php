<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $submenu['id'] ?>">
                    <label for="title">title Name</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title'] ?>">
                    <?php if (validation_errors()) : ?>
                        <small id="emailHelp" class="form-text text-muted"><?php validation_errors() ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Pilih Menu</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url'] ?>">
                    <?php if (validation_errors()) : ?>
                        <small id="emailHelp" class="form-text text-muted"><?php validation_errors() ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon'] ?>">
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