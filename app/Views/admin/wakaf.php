<?= $this->extend("admin/templates/index") ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Wakaf</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wakaf</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama User</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Wakaf</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nama User</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Wakaf</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($wakaf as $t) : ?>
                    <tr>
                        <td><?= $t->id ?></td>
                        <td><?= $t->fullname ?></td>
                        <td><?= $t->total ?></td>
                        <td>
                            <span class="badge badge-danger">
                                <?= $t->status ?>
                            </span>
                        </td>
                        <td><?= $t->created_at ?></td>
                        <td>
                            <a class="btn btn-success btn-circle" href="/administrator/wakaf/edit/<?= $t->id ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-circle" href="/administrator/wakaf/delete/<?= $t->id ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>