$(document).ready(function () {
  $("#loading-manual").hide();

  $("#btn-tambah-manual").click(function () {
    $("#btn-ubah").hide();
    $("#btn-simpan").show();
    $("#modal-title").html("Form Tambah Data Manual");
  });

  $("#modal-form").on("hidden.bs.modal", function (e) {});

  $("#btn-simpan").click(function () {
    const nama = $("#nama").val();
    const username = $("#username").val();
    const email = $("#email").val();
    const role = $("#role").val();

    if (nama === "" || username === "" || email === "" || role === "") {
      swal("Oops...", "Form tidak boleh ada yang kosong!", "error");
    } else {
      var data = new FormData();
      data.append("nama", $("#nama").val());
      data.append("username", $("#username").val());
      data.append("email", $("#email").val());
      data.append("role", $("#role").val());
      data.append("type", "insert");

      $("#loading-manual").show();

      $.ajax({
        url: "action",
        type: "POST",
        data,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend: function (e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function (response) {
          $("#loading-manual").hide();

          if (response.status == "sukses") {
            $("#view-data").html(response.html);
            swal("Good job!", "Data berhasil disimpan", "success");
            $("#modal-form").modal("hide");
          } else {
            swal("Oops...", "Ada yang error!", "error");
          }
        },
      });
    }
  });
});
