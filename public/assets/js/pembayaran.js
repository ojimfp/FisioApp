// $.fn.digits = function() {
//     return this.each(function() {
//         $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
//     })
// }

// menghitung subtotal (sebelum diskon)
var sum = 0;
$('.harga').each(function() {
    var num = $(this).val();
    if (num != 0) {
        sum += parseInt(num);
    }
});
$('#total').val(sum);

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
