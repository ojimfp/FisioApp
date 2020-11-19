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

    var a = document.getElementById("gaji_bersih").value;
    a = parseInt(a);
    var b = document.getElementById("ins_koor").value;
    b = parseInt(b);
    var c = document.getElementById("ins_tindakan").value;
    c = parseInt(c);
    var d = document.getElementById("ins_exe").value;
    d = parseInt(d);
    var e = document.getElementById("ins_minggu_satu").value;
    e = parseInt(e);
    var f = document.getElementById("ins_minggu_dua").value;
    f = parseInt(f);
    var g = document.getElementById("ins_minggu_tiga").value;
    g = parseInt(g);
    var h = document.getElementById("ins_minggu_empat").value;
    h = parseInt(h);
    var i = document.getElementById("ins_minggu_lima").value;
    i = parseInt(i);
    var j = document.getElementById("bonus").value;
    j = parseInt(j);

    document.getElementById("total_gaji").value = a + b + c + d + e + f + g + h + i + j;
});
