if (namaProdi !== "") {
    $("#view-dashboard").load(`index_data?prodi=${namaProdi}`);
} else {
    $("#view-dashboard").load(`admin/index_data`);
}

function start() {
    realtime = setInterval(function () {
        $("#view-dashboard").load("admin/index_data");
    }, 5000);
}
