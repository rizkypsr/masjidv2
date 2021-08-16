<?= $this->extend("templates/index")  ?>
<?= $this->section("content") ?>

<div class="container my-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "wakaf" ? "active" : ""  ?>" id="wakaf-tab" data-bs-toggle="tab"
                data-bs-target="#wakaf" type="button" role="tab" aria-controls="wakaf"
                aria-selected="true">Wakaf</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "zakat" ? "active" : ""  ?>" id="zakat-tab" data-bs-toggle="tab"
                data-bs-target="#zakat" type="button" role="tab" aria-controls="zakat"
                aria-selected="false">Zakat</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "infaq" ? "active" : ""  ?>" id="infaq-tab" data-bs-toggle="tab"
                data-bs-target="#infaq" type="button" role="tab" aria-controls="infaq"
                aria-selected="false">Infaq</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Wakaf -->
        <div class="tab-pane fade <?= $type == "wakaf" ? "show active" : ""  ?>" id="wakaf" role="tabpanel"
            aria-labelledby="wakaf-tab">

            <!-- Paket Wakaf -->
            <div class="accordion mt-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Paket Single
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Paket Single / 1 orang dengan harga Rp. 750.000. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Paket 2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Paket 2 / 2 orang dengan harga Rp. 1.500.000. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Paket 3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Paket 3 / 3 orang dengan harga Rp. 2.000.000. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Paket 4
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Paket 4 / 4 orang dengan harga Rp. 2.500.000. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Paket Keluarga
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Paket Keluarga / 5 orang dengan harga Rp. 3.000.000. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Peserta tambahan yang lebih dari 5 jiwa
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light bg-gradient">
                            Peserta tambahan yang lebih dari 5 jiwa dikenakan biaya Rp. 600.000 per orang. <br>
                            Fasilitas yang didapat:
                            <ol>
                                <li>Perlengkapan fardhu kifayah: Kain Kafan, Peti Jenazah dan Batu Nisan</li>
                                <li>Ambulance</li>
                                <li>Tanah Pemakaman (tidak termasuk petugas fardhu kifayah dan biaya tukang gali kubur)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form action="/transaksi" method="POST">
                <div class="card mt-3 p-4">
                    <h4 class="card-title">Pilih Paket Wakaf</h4>
                    <div class="card-body">
                        <select id="paketSelect" name="paket" class="form-select" aria-label="Metode Pembayaran">
                            <option selected value="Paket Single">Paket Single - Rp. 750.000</option>
                            <option value="Paket 2">Paket 2 - Rp. 1.500.000</option>
                            <option value="Paket 3">Paket 3 - Rp. 2.000.000</option>
                            <option value="Paket 4">Paket 4 - Rp. 2.500.000</option>
                            <option value="Paket 5">Paket Keluarga - Rp. 3.000.000</option>
                            <option value="Paket Tambahan">Paket Tambahan Lebih dari 5 Orang</option>
                        </select>

                        <div id="tambahan" class="my-3">
                            <label for="tambahanInput" class="form-label">Jumlah Orang</label>
                            <input type="number" name="tambahan" class="form-control" min="1" max="30" maxlength="2"
                                style="width: 5rem;" id="tambahanInput" value="1">
                        </div>
                    </div>
                </div>
                <div class="card mt-3 p-4">
                    <h4 class="card-title">Pilih Metode Pembayaran</h4>
                    <div class="card-body">
                        <select class="form-select" name="pembayaran" aria-label="Metode Pembayaran">
                            <option selected value="Transfer Bank Mandiri">Transfer Bank Mandiri</option>
                            <option value="Transfer Bank BNI">Transfer Bank BNI</option>
                            <option value="Transfer Bank BRI">Transfer Bank BRI</option>
                            <option value="OVO">OVO</option>
                            <option value="GOPAY">GOPAY</option>
                            <option value="DANA">DANA</option>
                        </select>

                        <button type="submit" class="btn btn-success mt-3">Wakaf Sekarang</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Zakat -->
        <div class="tab-pane fade <?= $type == "zakat" ? "show active" : ""  ?>" id="zakat" role="tabpanel"
            aria-labelledby="zakat-tab">...</div>

        <!-- Infaq -->
        <div class="tab-pane fade <?= $type == "infaq" ? "show active" : ""  ?>" id="infaq" role="tabpanel"
            aria-labelledby="infaq-tab">
            <div class="card mt-3 p-4">

                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nominal Infaq</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div id="emailHelp" class="form-text">Jumlah infaq harus lebih besar dari Rp.10.000,-
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Infaq Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>