<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>FisioApp - Print Nota</title>
    <style>
        @media print {
            @page {
                margin: 0 auto;
                /* imprtant to logo margin */
                sheet-size: 300px 250mm;
                /* imprtant to set paper size */
            }

            html {
                direction: ltr;
            }

            html,
            body {
                margin: 0;
                padding: 0
            }

            #printContainer {
                width: 250px;
                margin: auto;
                /*padding: 10px;*/
                /*border: 2px dotted #000;*/
                text-align: justify;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .resize {
                width: 100px;
                height: auto;
            }
        }
    </style>
</head>

<body onload="window.print();">
    <h1 id="logo" class="text-center"><img src="{{ asset('assets/img/logo-dark.png') }}" class="resize" alt="Logo"></h1>

    <div id='printContainer'>
        <h2 id="slogan" style="margin-top:0" class="text-center">Klinik Fisioterapi Niniek Soetini, M.Fis</h2>

        <table style="width: 100%;">
            <tr>
                <td class="text-center">Jl. Mulyosari Timur no. 69, Surabaya<br></td>
            </tr>
            <tr>
                <td class="text-center">Tlp. 031 5936394, WA 082230495969</td>
            </tr>
        </table>
        <hr>

        <table style="width: 100%;">
            <tr>
                <td>No. Nota</td>
                <td>:</td>
                <td><b>{{ $pembayaran->id }}</b></td>
            </tr>
            <tr>
                <td>Tgl. Nota</td>
                <td>:</td>
                <td><b>{{ $pembayaran->created_at->format('d/m/Y, H:i') }}<br></b></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><b>{{ $pembayaran->pasien->nama }}</b></td>
            </tr>
        </table>
        <hr>

        <table style="width: 100%;">
            <tr>
                <td hidden>ID TINDAKAN</td>
                <td><b>Tindakan</b></td>
                <td class="text-right"><b>Biaya</b></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            @foreach($pembayaran->tindakan as $tindakan)
            <tr>
                <td name="tindakan[]" hidden>{{ $tindakan->id }}</td>
                <td>{{ $tindakan->nama_tindakan }}</td>
                <td class="text-right">{{ number_format($tindakan->harga_jual) }}</td>
            </tr>
            @endforeach
        </table>
        <hr>

        <table style="width: 100%">
            <tr>
                <td>Sub Total</td>
                <td class="text-right">{{ number_format($pembayaran->subtotal) }}</td>
            </tr>
            <tr>
                <td>Diskon (Rp)</td>
                <td class="text-right">{{ number_format($pembayaran->diskon_rupiah) }}</td>
            </tr>
            <tr>
                <td>Diskon (%)</td>
                <td class="text-right">{{ $pembayaran->diskon_persen }}%</td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="text-right">{{ number_format($pembayaran->total_biaya) }}</td>
            </tr>
            <tr>
                <td>Tipe Pembayaran</td>
                <td class="text-right" id="tipe_pembayaran">{{ $pembayaran->tipe_pembayaran }}</td>
            </tr>
            <tr>
                <td id="jml_bayar"></td>
                <td class="text-right">{{ number_format($pembayaran->jml_bayar) }}</td>
            </tr>
            <tr>
                <td>Kembali</td>
                <td class="text-right">{{ number_format($pembayaran->kembali) }}</td>
            </tr>
        </table>
        <hr>

        <table style="width: 100%">
            <tr>
                <td>Catatan:</td>
                <td>{{ $pembayaran->catatan }}</td>
            </tr>
        </table>
        </br>

        <table style="width: 100%">
            <tr>
                <td class="text-center">-- Kasir: {{ $pembayaran->admin->name }} --</td>
            </tr>
        </table>

    </div>
</body>

<script>
    if (document.getElementById('tipe_pembayaran').innerHTML == 'Tunai') {
        document.getElementById('jml_bayar').innerHTML = 'Tunai';
    } else {
        document.getElementById('jml_bayar').innerHTML = 'Non-Tunai'
    }
</script>

</html>