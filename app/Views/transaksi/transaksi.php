<?= $this->extend("templates/index")  ?>
<?= $this->section("content") ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Histori Transaksi
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-light bg-secondary">
                <div class="row">
                    <div class="col">Id Transaksi</div>
                    <div class="col">Jenis</div>
                    <div class="col">Status</div>
                    <div class="col">Total</div>
                    <div class="col">Tanggal</div>
                </div>
            </li>
            <li class="list-group-item">
                <?php foreach ($transaksi as $t) : ?>
                <div class="row py-3">
                    <div class="col"><a href="/midtrans/success/<?= $t->id_transaksi ?>"><?= $t->id_transaksi ?></a>
                    </div>
                    <div class="col"><?= $t->jenis ?></div>
                    <div class="col"><?= $t->status ?></div>
                    <div class="col"><?= $t->jumlah ?></div>
                    <div class="col"><?= $t->created_at ?></div>
                </div>
                <?php endforeach ?>

            </li>

        </ul>
    </div>
</div>

<?= $this->endSection() ?>