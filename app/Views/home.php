<?= $this->extend("templates/index")  ?>

<?= $this->section("content") ?>
<?= $this->include("partials/jumbotron") ?>
<div class="container-fluid bg-image bg-image-infaq p-0">
    <div class="mask d-flex flex-column justify-content-center align-items-center"
        style="background-color: rgba(36, 81, 54, 0.5);">
        <h1 class="text-center fw-bold" style="color: #CDCF05;">AYO WAKAF</h1>
        <h2 class="text-light text-center">
            Nikmati kemudahan berwakaf uang dengan berbagai pilihan pembayaran yang nyaman bagi anda.
        </h2>
        <h3 class="text-light my-5">
            Pilihan cara berwakaf:
        </h3>
        <div class="d-flex w-25">
            <div class="card bg-success">
                <div class="card-body">
                    <img class="img-fluid" src="assets/img/bank.png" alt="Transfer Bank">
                    <h5 class="card-title text-center p-3">Transfer Bank</h5>
                </div>
            </div>
            <div class="card ms-3 bg-success">
                <div class="card-body">
                    <img class="img-fluid" src="assets/img/digital.png" alt="Bayar Online">
                    <h5 class="card-title text-center p-3">Bayar Online</h5>
                </div>
            </div>
        </div>
        <a href="/ziswaf/wakaf" class="mt-3 btn btn-outline-light btn-lg">Ayo Wakaf Sekarang</a>
    </div>
</div>

<?= $this->endSection() ?>