<?= $this->extend("admin/templates/index") ?>

<?= $this->section('content') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data Wakaf</h6>
    </div>
    <div class="card-body">
        <form action="/administrator/wakaf/update/<?= $wakaf["id"] ?>">
            <div class="form-group">
                <label for="inputName">Nama</label>
                <input type="text" class="form-control" name="fullname" required id="inputName" value="<?= $user ?>">
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>