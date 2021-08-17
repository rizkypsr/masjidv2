<?= $this->extend("templates/index")  ?>

<?= $this->section("content") ?>

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            Informasi Pembayaran
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <h6>Id Order</h6>
                    <p><?= $transaksi["id"] ?></p>
                </div>
                <div class="col-3">
                    <h6>Total</h6>
                    <p><?= $transaksi["total"] ?></p>
                </div>
                <div class="col-3">
                    <h6>Metode Pembayaran</h6>
                    <p><?= $transaksi["payment_type"] ?></p>
                </div>
                <div class="col-3">
                    <h6>Status</h6>
                    <p><?= $transaksi["status"] ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row  mt-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Detail Transaksi
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Id Transaksi</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["id"] ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Metode Pembayaran</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["payment_type"] ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Total Pembayaran</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["total"] ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Tanggal Transaksi</h6>
                            </div>
                            <div class="col">
                                <p>Today, 09:16 am</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Status</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["status"] ?></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Detail Pembayaran
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Bank</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["bank"] ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h6>Tanggal Expired Pembayaran</h6>
                            </div>
                            <div class="col">
                                <p><?= $transaksi["created_at"] ?></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>