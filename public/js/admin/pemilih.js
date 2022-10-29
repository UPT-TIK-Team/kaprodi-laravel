$(document).ready(function () {
  $("#loading").hide();
  $("#btn-upload").click(function () {
    var file = $("#file").val();
    if (file == "") {
      swal("Oops...", "Form tidak boleh kosong!", "error");
    } else {
      function hasExtension(inputID, exts) {
        var fileName = document.getElementById(inputID).value;
        return new RegExp(
          "(" + exts.join("|").replace(/\./g, "\\.") + ")$"
        ).test(fileName);
      }
      if (!hasExtension("file", [".xls"])) {
        swal("Oops...", "File XLS (Excel 97-2003) yang diizinkan!!", "error");
      } else {
        var data = new FormData();
        data.append("file", $("#file")[0].files[0]);
        $("#loading-manual").show();
        $.ajax({
          url: `${baseURL}/admin/import_data`,
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          dataType: "json",
          beforeSend: function (e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: () => {
            $("#loading-manual").hide();
            window.location.reload();
          },
          error: function (xhr) {
            $("#loading-manual").hide();
            alert("ERROR : " + xhr.responseText);
          },
        });
      }
    }
  });

  // Tambah Manual
  $("#loading-manual").hide();
  $("#btn-tambah-manual").click(function () {
    $("#btn-ubah").hide();
    $("#btn-simpan").show();
    $("#modal-title").html("Form Tambah Data Manual");
  });

  $("#modal-form").on("hidden.bs.modal", function (e) {});

  // Tambah Guru Manual
  $("#btn-simpan").click(function () {
    var n = $("#nama").val();
    var jk = $("#jns_kelamin").val();
    var j = $("#jabatan").val();
    var u = $("#username").val();
    var p = $("#password").val();

    if (n == "" || jk == "" || j == "" || u == "" || p == "") {
      swal("Oops...", "Form tidak boleh ada yang kosong!", "error");
    } else {
      tinymce.triggerSave();
      var data = new FormData();

      data.append("nama", $("#nama").val());
      data.append("jns_kelamin", $("#jns_kelamin").val());
      data.append("jabatan", $("#jabatan").val());
      data.append("username", $("#username").val());
      data.append("password", $("#password").val());

      data.append("type", "insert-manual");

      $("#loading-manual").show();
      $.ajax({
        url: "pemilih/action",
        type: "POST",
        data: data,
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

  // Hapus Semua Data Pemilih
  $("#load").hide();
  $("#btn-hapusData").click(function () {
    var data = new FormData();
    $("#load").show();

    $.ajax({
      url: `${baseURL}/admin/data_pemilih`,
      type: "DELETE",
      data: data,
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function (e) {
        if (e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function () {
        $("#load").hide();
        $("#modal-hapus").modal("hide");
        window.location.reload();
        swal("Good job!", "Data berhasil dihapus", "success");
      },
      error: function (xhr) {
        alert("ERROR : " + xhr.responseText);
      },
    });
  });
});
