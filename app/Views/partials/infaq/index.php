<div class="tab-pane fade <?= $type == "infaq" ? "show active" : ""  ?>" id="infaq" role="tabpanel"
    aria-labelledby="infaq-tab">
    <div class="card mt-3 p-4">

        <div class="card-body">

            <form id="payment-form" method="post" action="/midtrans/finish">
                <input type="hidden" name="result_type" id="result-type" value="">
                <input type="hidden" name="result_data" id="result-data" value="">
            </form>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nominal Infaq</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input id="totalInput" type="num" class="form-control" name="total" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div id="emailHelp" class="form-text">Jumlah infaq harus lebih besar dari Rp.10.000,-
                </div>
            </div>

            <button id="pay-button" type="button" class="btn btn-success mt-3">Infaq Sekarang</button>

        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-Ysozo8JlNh3Qp8ECQyJ4zKlu">
</script>
<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    const total = $("#totalInput").val();


    $.ajax({
        type: 'POST',
        url: '<?= base_url("transaksi/checkout/infaq") ?>',
        data: {
            total: total
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onClose: function(result) {
                    changeResult('close', result);
                    $("#payment-form-infaq").submit();
                }
            });
        }
    });
});
</script>