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

            <label for="inputKekayaan" class="form-label">Total Kekayaan (1 tahun)</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control" id="inputKekayaan" aria-describedby="emailHelp">
            </div>
            <h6>Yang harus dibayarkan: </h6>
            <input type="hidden" name="resultMaal" id="kekayaan">
            <p id="totalZakat">Rp. 0</p>
        </div>
    </div>

    <form id="payment-form-zakat" method="post" action="/midtrans/finish">
        <input type="hidden" name="result_type" id="result-type-zakat" value="">
        <input type="hidden" name="result_data" id="result-data-zakat" value="">
    </form>

    <div class="card mt-3 p-4" id="zakatFitrah">
        <div class="card-body">

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
        </div>
    </div>

    <button id="pay-button-zakat" type="button" class="btn btn-success mt-3">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-Ysozo8JlNh3Qp8ECQyJ4zKlu">
</script>
<script type="text/javascript">
$('#pay-button-zakat').click(function(event) {
    event.preventDefault();

    const paket = $("select#zakatSelect").val();

    let total;

    if (paket == "maal") {
        total = $("#kekayaan").val();
    } else {
        total = $("#totalFitrah").val();
    }

    $.ajax({
        type: 'POST',
        url: '<?= base_url("transaksi/checkout/zakat") ?>',
        data: {
            total: total,
            jenis: paket
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type-zakat');
            var resultData = document.getElementById('result-data-zakat');

            function changeResult(type, data) {
                $("#result-type-zakat").val(type);
                $("#result-data-zakat").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form-zakat").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form-zakat").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form-zakat").submit();
                },
                onClose: function(result) {
                    changeResult('close', result);
                    $("#payment-form-wakaf").submit();
                }
            });
        }
    });
});
</script>