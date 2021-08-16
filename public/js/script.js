$(document).ready(function () {
  $("#tambahan").hide();

  $("select#paketSelect").on("change", function () {
    if (this.value == "Paket Tambahan") {
      $("#tambahan").show();
    } else {
      $("#tambahan").hide();
    }
  });
});
