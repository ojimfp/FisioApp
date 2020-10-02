// setup jautocalc untuk menghitung total pembayaran (sebelum diskon)
function autoCalcSetup() {
    $("form[name=kasir] tr[name=harga]").jAutoCalc({
        keyEventsFire: true,
        decimalPlaces: -1
    });

    $("form[name=kasir]").jAutoCalc({
        decimalPlaces: -1
    });
}

autoCalcSetup();

// menghitung grand total pembayaran (sesudah diskon)
$(".input").on("input", function() {
    var x = document.getElementById("total").value;
    x = parseInt(x.replace(/,/g, ""));
    var y = document.getElementById("diskon_persen").value;
    y = parseInt(y);
    var z = document.getElementById("diskon_rupiah").value;
    z = parseInt(z);

    if (Number.isNaN(y)) {
        y = 0;
    } else if (Number.isNaN(z)) {
        z = 0;
    }

    document.getElementById("grand_total").value = x - x * (y / 100) - z;
});