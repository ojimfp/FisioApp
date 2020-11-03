// menghitung gaji bersih (gaji pokok / hari kerja x gaji masuk)
$(".hari").on("input", function() {
    var x = document.getElementById("gaji_pokok").value;
    x = parseInt(x);
    var y = document.getElementById("hari_kerja").value;
    y = parseInt(y);
    var z = document.getElementById("hari_masuk").value;
    z = parseInt(z);

    if (Number.isNaN(y)) {
        y = 0;
    } else if (Number.isNaN(z)) {
        z = 0;
    }

    document.getElementById("gaji_bersih").value = Math.round(x / y * z);
});
