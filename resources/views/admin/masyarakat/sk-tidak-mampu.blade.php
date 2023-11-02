<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .header,
        .judul-surat {
            text-align: center;
        }

        .kecil {
            line-height: 40%;
        }

        .ttd {
            margin-left: 60%;
            text-align: center;
        }
    </style>
</head>

<body>
    @php
        function tgl_indo($tanggal)
        {
            $bulan = [
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ];
            $pecahkan = explode('-', $tanggal);
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    @endphp

    <div class="header">
        <h4 class="kecil">PEMERINTAH KABUPATEN BOMBANA</h4>
        <H4 class="kecil">KECAMATAN LANTARI JAYA</H4>
        <H3 class="kecil">DESA KONOHA</H3>
        <p class="">Jl.Rajawali No.2 Lombakasih, Kode Pos 93774</p>
    </div>
    <hr>
    <br>
    <br>

    <div class="judul-surat">
        <h3><U>SURAT KETERANGAN TIDAK MAMPU</U></h3>
        <h4>NOMOR : ...../ ...../ .....</h4>
    </div>

    <br><br>

    <p>Dengan ini menerangkan bahwa :</p>
    <ol type="a">
        <li>Nama
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            : {{ $masyarakat->nama }}</li>
        <li>Tempat/Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;: {{ $masyarakat->tempat_lahir }},
            {{ tgl_indo(date($masyarakat->tanggal_lahir)) }}</li>
        <li>Jenis Kelamin
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            : {{ $masyarakat->jenis_kelamin }}
        </li>
        <li>Nama Orang Tua
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            : {{ $masyarakat->keluarga->kepala_keluarga }}
        </li>
        <li>Alamat Orang Tua
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            : {{ $masyarakat->keluarga->alamat }}
        </li>
    </ol>

    <br>
    <p>Yang Bersangkutan adalah benar-benar warga desa konoha yang berasal dari keluarga kurang mampu.</p>
    <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    <br>
    <div class="ttd">
        <p>Konoha, {{ tgl_indo(date('Y-m-d')) }}</p>
        <p>Kepala Desa Konoha</p>
        <br>
        <br>
        .................

    </div>

</body>

</html>
