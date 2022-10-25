$(document).ready(function () {
  $("#loading").hide();

  $("#btn-pilih").click(function () {
    const id_calon = $("#id-calon").val();
    var data = new FormData();
    data.append("kualifikasi-1", $("input[name='kepemimpinan']:checked").val());
    data.append("kualifikasi-2", $("input[name='inovasi']:checked").val());
    data.append("kualifikasi-3", $("input[name='analitis']:checked").val());
    data.append("kualifikasi-4", $("input[name='keputusan']:checked").val());
    data.append("kualifikasi-5", $("input[name='akademik']:checked").val());
    data.append("kualifikasi-6", $("input[name='persuasi']:checked").val());
    data.append("kualifikasi-7", $("input[name='komunikasi']:checked").val());
    data.append("id_calon", id_calon);
    data.append("type", "pilih");

    data.forEach((i) => {
      if (i === "undefined") {
        swal("Oops...", "Pastikan semua nilai terisi", "error");
        throw new Error();
      }
    });

    $.ajax({
      url: "votingKaprodi",
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        if (response.status == "sukses") {
          swal(
            {
              title: "OK",
              type: "success",
            },
            function () {
              location.reload();
            }
          );
        } else {
          swal("Oops...", "Ada yang Error!", "error");
          return false;
        }
      },
      error: function (xhr) {
        alert("ERROR : " + xhr.responseText);
      },
    });
  });
});
