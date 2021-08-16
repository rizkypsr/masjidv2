<div class="tab-pane fade <?= $type == "zakat" ? "show active" : ""  ?>" id="zakat" role="tabpanel"
    aria-labelledby="zakat-tab">
    <div class="card mt-3 p-4">
        <div class="card-body">
            <h5 class="card-title">Pilih Jenis Zakat</h5>
            <select id="zakatSelect" class="form-select" aria-label="Zakat">
                <option selected value="maal">Zakat Maal</option>
                <option value="fitrah">Zakat Fitrah</option>
            </select>
        </div>
    </div>

    <div class="card mt-3 p-4" id="zakatMaal">
        <div class="card-body">
            <form action="">
                <label for="inputKekayaan" class="form-label">Total Kekayaan (1 tahun)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="number" class="form-control" id="inputKekayaan" aria-describedby="emailHelp">
                </div>
                <h6>Yang harus dibayarkan: </h6>
                <input type="hidden" name="resultMaal" id="kekayaan">
                <p id="totalZakat">Rp. 0</p>
                <button type="submit" class="btn btn-success mt-3">Bayar Sekarang</button>
            </form>
        </div>
    </div>

    <div class="card mt-3 p-4" id="zakatFitrah">
        <div class="card-body">
            <form action="">
                <select id="zakatFitrahSelect" class="form-select" aria-label="Zakat">
                    <option selected value="35000">Beras Premium - Rp. 35.000 / orang</option>
                    <option value="26000">Beras Medium - Rp. 26.000 / orang</option>
                </select>
                <br>
                <label for="inputKekayaan" class="form-label">Untuk</label>
                <div class="input-group mb-3">
                    <input id="inputOrang" type="num" min="1" class="form-control" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Orang</span>
                </div>
                <h6>Yang harus dibayarkan: </h6>
                <input type="hidden" name="resultFitrah" id="totalFitrah">
                <p id="totalZakatFitrah">Rp. 0</p>

                <button type="submit" class="btn btn-success mt-3">Bayar Sekarang</button>
            </form>
        </div>
    </div>
</div>