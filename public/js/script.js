$(document).ready(function () {
  $("#tambahan").hide();
  $("#zakatFitrah").hide();

  $("select#paketSelect").on("change", function () {
    if (this.value == "Paket Tambahan") {
      $("#tambahan").show();
    } else {
      $("#tambahan").hide();
    }
  });

  $("select#zakatSelect").on("change", function () {
    if (this.value == "maal") {
      $("#zakatMaal").show();
      $("#zakatFitrah").hide();
    } else {
      $("#zakatMaal").hide();
      $("#zakatFitrah").show();
    }
  });

  $("#inputKekayaan").on("keyup", function () {
    const totalKekayaan = parseInt($("#inputKekayaan").val());

    const result = (totalKekayaan * 2.5) / 100;

    $("#kekayaan").val(result);
    $("#totalZakat").html(convertToRupiah(result));
  });

  $("#inputOrang").on("keyup", function () {
    const beras = parseInt($("#zakatFitrahSelect").val());

    const totalOrang = parseInt($("#inputOrang").val());

    const result = beras * totalOrang;

    $("#totalFitrah").val(result);
    $("#totalZakatFitrah").html(
      isNaN(result) ? "Rp. 0" : convertToRupiah(result)
    );
  });
});

function convertToRupiah(angka) {
  var rupiah = "";
  var angkarev = angka.toString().split("").reverse().join("");
  for (var i = 0; i < angkarev.length; i++)
    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ".";
  return (
    "Rp. " +
    rupiah
      .split("", rupiah.length - 1)
      .reverse()
      .join("")
  );
}
