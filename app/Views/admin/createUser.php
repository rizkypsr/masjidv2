<?= $this->extend("admin/templates/index") ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
</div>
<?php $validation = \Config\Services::validation(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
    </div>
    <div class="card-body">
        <form action="/admin/user/save">
            <div class="mb-3">
                <label for="inputName" class="form-label">Nama</label>
                <input type="text"
                    class="form-control <?php if ($validation->hasError('name')) : ?>is-invalid<?php endif ?>"
                    id="inputName" name="name" value="<?= old('name') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text"
                    class="form-control <?php if ($validation->hasError('username')) : ?>is-invalid<?php endif ?>"
                    id="inputUsername" name="username">
                <div class="invalid-feedback">
                    <?= $validation->getError('username') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email"
                    class="form-control <?php if ($validation->hasError('email')) : ?>is-invalid<?php endif ?>"
                    id="inputEmail" name="email">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>