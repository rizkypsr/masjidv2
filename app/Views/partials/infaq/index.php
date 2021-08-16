<div class="tab-pane fade <?= $type == "infaq" ? "show active" : ""  ?>" id="infaq" role="tabpanel"
    aria-labelledby="infaq-tab">
    <div class="card mt-3 p-4">

        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nominal Infaq</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div id="emailHelp" class="form-text">Jumlah infaq harus lebih besar dari Rp.10.000,-
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Infaq Sekarang</button>
            </form>
        </div>
    </div>
</div>