<?= $this->extend("templates/index")  ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Wakaf</h4>
            <hr>
            <h5>Paket</h5>
            <p><?= $paket ?></p>
            <br>
            <h5>Total yang harus dibayar</h5>
            <p><?= $total ?></p>
            <br>
            <h5>Metode Pembayaran</h5>
            <p><?= $pembayaran ?></p>
            <br>
            <h5>Fasilitas yang didapat:</h5>
            <ol>
                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                <li>Ambulance</li>
                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                </li>
            </ol>
            <br>
            <form action="" method="GET">
                <button class="btn btn-success">Lanjutkan Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>